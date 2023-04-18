<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportProductsRequest;
use App\Http\Service\ImportProductService;
use App\Models\LogFiles;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductController extends Controller
{
    public function __construct(protected ImportProductService $importProductService)
    {
    }
    private int $countSeat = 1;
    private array $listError = [];

    public function index()
    {
        return view('products.index');
    }

    public function import(ImportProductsRequest $request)
    {
        ini_set('max_execution_time', '300');
        $fileName = $request->file('file')->getClientOriginalName();
        $log = new LogFiles();
        if ($log->checkCsv($fileName)) {
            return response()->json([
                'error' => 'File already exists'
            ]);
        }

        $file = $request->file('file')->store('csv');

        $products = (new FastExcel)->import(Storage::disk('local')->path($file), function ($line) use ($file) {
            set_time_limit(0);
            $this->countSeat++;
            $row = $this->countSeat;
            try {
                $data = [
                    'name' => $line['Name'],
                    'sku' => $line['SKU'],
                    'description' => $line['Description'],
                    'price' => $line['Price'],
                    'stock' => $line['Stock'],
                    'status' => $line['Status'],
                    'type' => $line['Type'],
                    'vendor' => $line['Vendor'],
                    'created_at' => $line['Created At'],
                ];
            } catch (\Exception $e) {
                Storage::disk('local')->delete($file);
                return response()->json([
                    'error' => $e->getMessage(),
                ]);
            }

            $validator = Validator::make($data, [
                'name' => ['required', 'string'],
                'sku' => ['required', 'string'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric'],
                'stock' => ['required', 'integer'],
                'status' => ['required', Rule::in(['Drafted', 'Published']),],
                'type' => ['required', 'string'],
                'vendor' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                $message = implode('', $validator->errors()->all());
                $this->listError[] = 'Line ' . $row . ': ' . $message;
            } else {
                return $data;
            }
        });
        Storage::disk('local')->delete($file);
        $lengthChunk = 10000;
        $productChunk = array_chunk($products->toArray(), $lengthChunk);
        foreach ($productChunk as $arrProduct) {
            set_time_limit(0);
            try {
                DB::beginTransaction();
                foreach ($arrProduct as $key => $product) {
                    Product::insert($product);
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Storage::disk('local')->delete($file);
                return response()->json([
                    'error' => $e->getMessage(),
                    'data' =>  $this->listError,
                ]);
            }
        }

        LogFiles::create([
            'name' => $fileName
        ]);
        Storage::disk('local')->delete($file);
        $listError = $this->listError;
        $products = Product::query()->paginate('20');
        return view('products.list', compact('products', 'listError'));
    }
}
