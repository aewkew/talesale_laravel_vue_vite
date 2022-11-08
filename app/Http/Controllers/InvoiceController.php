<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\Counter;

class InvoiceController extends Controller
{
    // 
    public function invoices(){
        $invoice = invoice::with('customer')->orderBy('id','DESC')->get();
        return response()->json(
            [
             'products' => $invoice,
             'message' => 'Invoice',
             'code' => 200
        ]
    );
    }    

    public function create_invoice(Request $request){
     $counter = Counter::where('key','invoice')->first();
     $random = Counter::where('key','invoice')->first();
           
      $invoice = invoice::orderBy('id', 'DESC')->first();
       if($invoice){
         $invoice = $invoice->id+1;
         $counters = $counter->value + $invoice;
       }else{
         $counters = $counter->value;
       }
        $formData =[
            'number' => $counter->prefix.$counters,
            'customer_id' => null,
            'customer' => null,
            'date' => date('Y-m-d'),
            'due-date'=> null,
            'reference'=>null,
            'discount' => 0,
            'term_and_conditions' => 'Default Terms and Conditions',
            'items' => [
                [
                    'product_id' => null,
                    'product' => null,
                    'unit_price' => 0,
                    'quantity' => 1
                ]
            ]
        ];
        return response()->json($formData);
    }
}
