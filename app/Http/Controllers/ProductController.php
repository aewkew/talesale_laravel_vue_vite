<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function addproduct(Request $request)
    {
        $products=new Product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->save(); 
    }
 
    
    public function editproduct(Request $request, $id)
    {  
        $products=Product::find($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->save(); 
        return  $products;
      
    }

   
    


}
