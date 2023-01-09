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
        ->select('invoices.updated_at','invoices.total')
        //->select(DB::raw('SUM(invoices.total)as sum_tatol'))
        //->select(DB::raw('MONTH(invoices.updated_at) month'))
       // ->groupBy('month')
      
       //->select(DB::raw('SUM(invoices.total)as sum_tatol'))
        ->get();
        return response()->json([
            'invoice_total' => $invoice,
            'message' => 'Invoice',
            'code' => 200
        ]);
    }
}
