<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(){
        $products = Product::all();
        return response()->json(
            [
            'products' => $products,
             'message' => 'Product',
             'code' => 200
        ]
    );
    }

    public function addproduct(Request $request)
    {
        $products=new Product();
        $products->name          = $request->name;
        $products->description   = $request->description;
        $products->price         = $request->price;
        $products->save();
        return response()->json([
           'message' => 'product Create Success ',
            'code' => 200
       ]);
    }
 
    
    public function getproduct($id){  
        $products=Product::find($id);
        return response()->json($products);
       
    }

    public function deleteProduct($id) {
         $products=Product::find($id);
         if($products->delete()){
              return response()->json([ 
                'message' => 'Product Delete SuccesFully',
                 'code' => 200
            ]);
         }else {
            return response()->json([
                'message'=> 'Product with id:$id does not exits'
            ]);
         }
    }

    public function updateProduct($id, Request $request){
        $products= Product::where('id', $id)->first();
        $products->name          = $request->name;
        $products->description   = $request->description;
        $products->price         = $request->price;
        $products->save();
        return response()->json([
           'message' => 'product Update Success ',
           'code' => 200
       ]);
    }
}
