<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportProductsRequest;
use App\Models\LogFiles;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductController extends Controller
{
    private int $countSeat = 1;
    private array $listError = [];

    public function index()
    {
        return view('products.index');
    }

    public function import(ImportProductsRequest $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $log = new LogFiles();
        if ($log->checkCsv($fileName) ) {
            return response()->json([
                'message' => 'File already exists'
            ]);
        }

        $file = $request->file('file')->store('csv');
        $listError = [];

        $products = (new FastExcel)->import(Storage::disk('local')->path($file), function ($line) use ($file) {
            $this->countSeat ++;
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
                ];
            } catch (\Exception $e) {
                Storage::disk('local')->delete($file);
                return view('welcome')->with('error', $e->getMessage());
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
                $this->listError[] = 'Line '. $row . ': ' . $message;
            } else{
                return $data;
            }
        });
        Storage::disk('local')->delete($file);
        $lengthChunk = 10000;
        $productChunk = array_chunk($products->toArray(), $lengthChunk);
        DB::beginTransaction();
        try {
            foreach ($productChunk as $arrProduct){
                foreach ($arrProduct as $key => $product){
                    $error = $product;
                    Product::insert($product);
                }
            }
            DB::commit();
            LogFiles::insert([
                'name' => $fileName
            ]);
            Storage::disk('local')->delete($file);
            return view('welcome', compact('listError'))->with('success', 'Import Succsess');
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::disk('local')->delete($file);
            return view('welcome', compact('listError'))->with('error', 'Import Error');
        }
    }
}
