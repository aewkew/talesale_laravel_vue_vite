<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\historyDealing;
use App\Models\Product;

class HistoryDealingController extends Controller
{
    public function hisdeal(){
        $his = historyDealing::all();
        return response()->json(
            [
             'history_dealings' => $his,
             'message' => 'historyDealing',
             'code' => 200
        ]
    );
}

     public function innerJoin(){
        $result = DB::table('products')
        ->join('history_dealings','products.id','=','history_dealings.product_id')
        ->select('products.product_name')
        ->get();
        return response()->json(
            [
             'history_dealings' => $result,
             'message' => 'historyDealing',
             'code' => 200
        ]);
     }  
    
     public function innerJoinhis(){
        $result = DB::table('history_dealings')
        ->join('users','users.id','=','history_dealings.user_id')
        ->join('products','products.id','=','history_dealings.product_id')
        ->join('customers','customers.id','=','history_dealings.customer_id')
        ->select('products.product_name','users.name','customers.customer_name')
        ->get();
        return response()->json(
            [
             'history_dealings' => $result,
             'message' => 'historyDealing',
             'code' => 200
        ]);

     }  

    


}
