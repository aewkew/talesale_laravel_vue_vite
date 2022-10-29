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

    public function subqueryJoin(){
          $subjectData = DB::table('history_dealings')->select('product_id', 'name as sujectName');
          $result = DB::table('products')
          ->joinSub($subjectData,'subjectData', function($join){
              $join->on('products.id','=','subjectData.product_id');
          })->get();
          return response()->json(
            [
             'history_dealings' => $result,
             'message' => 'historyDealing',
             'code' => 200
            ]);
    }
    


}