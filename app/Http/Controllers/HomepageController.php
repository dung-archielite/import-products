<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()->paginate('20');
        return view('welcome', compact('products'));
    }
}
