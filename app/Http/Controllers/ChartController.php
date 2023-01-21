<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\invoice;
use App\Models\invoiceItem;
use App\Models\Chart;
use Carbon\Carbon ;






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
    

    public function color_select(){
        $invoice_item = DB::table('invoice_items')
        ->join('products','products.id','=','invoice_items.product_id')
        ->select('invoice_items.invoice_id','products.product_color')
       // ->select('products.product_color as labels',DB::raw("count(product_color)as count"))
       ->get()
       ->groupBy('invoice_id')
      // ->select('products.product_color as labels',DB::raw("count(product_color)as count"))
         ;
        return response()->json( [
            'invoice_item' => $invoice_item,
            'message' => 'Invoice',
            'code' => 200
       ]);
    }
    




    
    public function total_chart(){
        $invoice = invoice::whereYear('updated_at', Carbon::now()->year-1)
        ->where('status','success')
       ->select(DB::raw('MONTH(updated_at) month'),DB::raw('SUM(invoices.total)as sum_tatol'))
        ->groupBy('month')->orderBy('month','ASC')
        ->get();
        return response()->json( 
            [
                'month_item' => $invoice ,
                'message' => 'month_bar',
                'code' => 200
            ]
        ); 
          
    }



    public function selcet_chart(){
        $invoice = invoice::where('status','success')
        ->select(DB::raw('MONTH(updated_at) month'),DB::raw('SUM(invoices.total)as sum_tatol'))
        ->groupBy('month')->orderBy('month','ASC')->get();
        return response()->json([
            'month_item' => $invoice ,
            'message' => 'month_bar',
            'code' => 200
        ]); 
    }


    
    public function comis_total(){
        $comis = DB::table('invoices')
        ->join('customers','customers.id','=','invoices.customer_id')
      // ->where('status','success')
        ->select('invoices.customer_id','customers.customer_name','invoices.sub_total')
      //  ->select('customer_name')
         ->groupBy('customer_name')
        ->select('customer_name',DB::raw('SUM(sub_total)as sum_tatol'))
         ->get();
        return response()->json([  
         'total_comis' => $comis,
         'message' => 'commission',
        ]);
    }

    public function selcet_total(){
        $comis = DB::table('invoices')
        ->join('customers','customers.id','=','invoices.customer_id')
        ->select('invoices.customer_id','customers.customer_name','invoices.sub_total')
      //  ->select('customer_name')
         ->groupBy('customer_name')
        ->select('customer_name',DB::raw('SUM(sub_total)as sum_tatol'))
         ->get();
        return response()->json([  
         'total_comis' => $comis,
         'message' => 'commission',
        ]);
    }
    

    public function test_date(){
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $comis = DB::table('invoices')->where('status','success')
        ->join('users','users.id','=','invoices.user_id')
        ->select('invoices.customer_id','invoices.sub_total','invoices.updated_at','users.name')
        ->whereYear('invoices.updated_at','=', $year)
        ->whereMonth('invoices.updated_at','=', $month)
        ->groupBy('users.name')
        ->select('users.name',DB::raw('SUM(invoices.sub_total)as sum_tatol'))->get();
       // ->groupBy('customer_name')
       // ->select('customer_name',DB::raw('SUM(sub_total)as sum_tatol'))
      // ->select('')
      // 
       // 

        return response()->json([  
         'total_comis' => $comis,
         'message' =>  $month,
        ]);
        
    }


}
