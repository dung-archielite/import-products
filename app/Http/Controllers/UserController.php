<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;
use Rap2hpoutre\FastExcel\FastExcel;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
//        if (Storage::exists('csv/' .$fileName) ) {
//            return response()->json([
//                'message' => 'File already exists'
//            ]);
//        }

        $file = $request->file('file')->store('csv', $fileName);
        $users = (new FastExcel)->import(Storage::disk('local')->path($file), function ($line) {
            return [
                'name' => $line['name'],
                'email' => $line['email'],
                'password' => bcrypt('12345678'),
                'level' => $line['level'] ?: '0',
            ];
        });
        $listError = [];
        $customer_chunk = array_chunk($users->toArray(), 10000);

    }
}
