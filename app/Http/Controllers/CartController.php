<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{      
   public function products(){
      $product = Product::all();
      return response()->json(
          [
           'products' => $product,
           'message' => 'Product',
           'code' => 200
      ]
  );
  }
     public function addCart(Request $request)
     {
      $products =Product::find($request->get('product_id'))->first();
      return response()->json($products);
       
     }
}
