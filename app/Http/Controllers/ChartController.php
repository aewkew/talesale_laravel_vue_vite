<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\invoice;
use App\Models\invoiceItem;
use App\Models\Chart;

class ChartController extends Controller
{      
    
    public function invoice_item(){
        $invoice_item = DB::table('invoice_items')
        ->join('products','products.id','=','invoice_items.product_id')
        ->get();
        return response()->json(
            [
             'invoice_item' => $invoice_item,
             'message' => 'Invoice',
             'code' => 200
        ]
    );
    

    }      

    public function color_coute(){
        $invoice_item = DB::table('invoice_items')
        ->join('products','products.id','=','invoice_items.product_id')
        ->select('products.product_name','products.product_brand','products.product_color')
        ->get();
        return response()->json(
            [
             'invoice_item' => $invoice_item,
             'message' => 'Invoice',
             'code' => 200
        ]
    );
    }

    // public function color_chrat(){
    //     $invoice_item = DB::table('invoice_items')
    //     ->join('products','products.id','=','invoice_items.product_id')
    //     ->select('products.product_name','products.product_brand','products.product_color')
    //     ->get()->groupBy('');
    //     return response()->json(
    //         [
    //          'invoice_item' => $invoice_item,
    //          'message' => 'Invoice',
    //          'code' => 200
    //     ]
    // );
    // }

    public function color_chrat(){
        $invoice_item = DB::table('invoice_items')
        ->join('products','products.id','=','invoice_items.product_id')
        ->select('products.product_color as labels',DB::raw("count(product_color)as count"))
        ->groupBy('product_color')
        ->get();
        return response()->json( [
            'invoice_item' => $invoice_item,
            'message' => 'Invoice',
            'code' => 200
       ]);
      
    }
    
    public function total_chart(){
        $invoice = invoice::where('status','success')
        ->select(DB::raw('MONTH(updated_at) month'),DB::raw('SUM(invoices.total)as sum_tatol'))
        ->groupBy('month')->orderBy('month','ASC')->get();
        return response()->json([
            'month_item' => $invoice ,
            'message' => 'month_bar',
            'code' => 200
        ]);
         
    }
}
