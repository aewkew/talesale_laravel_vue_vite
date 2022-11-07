<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use SebastianBergmann\LinesOfCode\Counter;

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
    // $counter = Counter::where('key','invoice')->first();
      //  $random = Counter::where('key','invoice')->first();
           
      $invoice = invoice::orderBy('id', 'DESC')->first();
       if($invoice){
         $invoice = $invoice->id+1;
       //  $counters = $counter->value + $invoice;
       }else{
       //  $counters = $counter->value;
       }
        $formData =[
        //    'number' => $counter->prefix.$counters,
            'customer_id' => null,
            'customer' => null,
            'date' => date('Y-m-d'),
        ];
    }
}
