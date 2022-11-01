<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /*
     public function innerJoin(){
        $result = DB::table('products')
        ->join('history_dealings','products.id','=','history_dealings.product_id')
        ->select('products.name')
        ->get();
        return $result;

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
            $product->product_id    = $request->product_id;
            $product->product_name  = $request->product_name;
            $product->product_brand = $request->product_brand;
            $product->product_color = $request->product_color;
            $product->product_price = $request->product_price;
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
        $product->product_name          = $request->product_name;
        $product->product_brand         = $request->product_brand;
        $product->product_color         = $request->product_color;
        $product->product_price         = $request->product_price;
        $product->save();
        return response()->json([
           'message' => 'product Update Success ',
           'code' => 200
       ]);
    }
      
    public function search_color(Request $request){
        $product = Product::where('product_color','LIKE','%'.$request->keyword_color.'%')->get();
        return response()->json($product);
    
    }
    public function search_brand(Request $request){
        $product = Product::where('product_brand','LIKE','%'.$request->keyword_brand.'%')->get();
        return response()->json($product);
    
    }
    public function search_id(Request $request){
        $product = Product::where('product_id','LIKE','%'.$request->keyword_id.'%')->get();
        return response()->json($product);
    
    }


    
    public function selectProduct(){
        $products = Product::where('product_color')->get();
        return response()->json($products);
    }
    
    
}
