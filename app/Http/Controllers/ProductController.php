<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function get_all_product(){
        $products = Product::all();
        return response() ->json([
            'products' => $ $products
        ],200);
    }
}
