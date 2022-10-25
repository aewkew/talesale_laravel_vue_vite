<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /*
     public function index(){
        $product = Product::all()->toArray(); 
        return response()->json(
            [
             'products' => $product,
             'message' => 'Product',
             'code' => 200
        ]
    ); 
    return array_reverse($product);
     }  */
     
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

    public function addproduct(Request $request)
    {    
        try{
            $product=new Product();
            $product->name          = $request->name;
            $product->brand         = $request->brand;
            $product->color        = $request->color;
            $product->price         = $request->price;
            $product->save();

            $success = true;
            $message = "Add Product successfully";
    

        }catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);

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
        $products->brand         = $request->brand;
        $products->color         = $request->color;
        $products->price         = $request->price;
        $products->save();
        return response()->json([
           'message' => 'product Update Success ',
           'code' => 200
       ]);
    }
}
