<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function import(ImportProductsRequest $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
//        if (Storage::exists('csv/' .$fileName) ) {
//            return response()->json([
//                'message' => 'File already exists'
//            ]);
//        }

//        change store to storeAs storeAs('csv', $fileName)
        $file = $request->file('file')->store('csv');
        $products = (new FastExcel)->import(Storage::disk('local')->path($file), function ($line) {
            return [
                'name' => $line['Name'],
                'sku' => $line['SKU'],
                'description' => $line['Description'],
                'price' => $line['Price'],
                'stock' => $line['Stock'],
                'status' => $line['Status'],
                'type' => $line['Type'],
                'vendor' => $line['Vendor'],
            ];
        });

        $listError = [];
        $lengthChunk = 10000;
        $productChunk = array_chunk($products->toArray(), $lengthChunk);

        foreach ($productChunk as $keyChunk => $arrProduct){
            foreach ($arrProduct as $key => $product){
                $validator = Validator::make($product, [
                    'name' => 'required|string',
                    'sku' => 'required|string',
                    'description' => 'required|string',
                    'price' => 'required|between:0,99.99',
                    'stock' => 'required|integer',
                    'status' => ['required', Rule::in(['Drafted', 'Published']),],
                    'type' => 'required|string',
                    'vendor' => 'required|string',
                ]);

                if($validator->fails()) {
                    $message = implode('', $validator->errors()->all());
                    $listError[$keyChunk*$lengthChunk + $key+2] = 'Line '.($keyChunk*$lengthChunk + $key+2).': '. $message;
                } else {
                    DB::beginTransaction();
                    try {
                        Product::insert($product);
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollback();
                    }
                }
            }
        }

        dd($listError);

        return view('welcome', compact('listError'))->with('success', 'Import Succsess');
    }
}
