<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
     public function index(){
       $product = DB::table('products')->get();
       return view('product.index',['products' => $product]);
     }  

     
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
            $product->product_id    = $request->product_id;
            $product->name          = $request->name;
            $product->brand         = $request->brand;
            $product->color         = $request->color;
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
        $product= Product::where('id', $id)->first();
        $product->product_id    = $request->product_id;
        $product->name          = $request->name;
        $product->brand         = $request->brand;
        $product->color         = $request->color;
        $product->price         = $request->price;
        $product->save();
        return response()->json([
           'message' => 'product Update Success ',
           'code' => 200
       ]);
    }
}
