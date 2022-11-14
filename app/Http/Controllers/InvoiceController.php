<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\Counter;
use App\Models\invoiceItem;


class InvoiceController extends Controller
{
    // 
    public function invoices(){
        $invoice = invoice::with('customer')->orderBy('id','DESC')->get();

        return response()->json(
            [
             'invoice' => $invoice,
             'message' => 'Invoice',
             'code' => 200
        ]
    );
    }    
          
    public function add_invoice(Request $request){
         $invoiceitem = $request->input("invoice_item");

         $invoicedata['sub_total'] = $request->input("subtotal");
         $invoicedata['total'] = $request->input("total");
         $invoicedata['customer_id'] = $request->input("customer_id");
         $invoicedata['number'] = $request->input("number");
         $invoicedata['date'] = $request->input("date");
         $invoicedata['due_date'] = $request->input("due_date");
         $invoicedata['discount'] = $request->input("discount");
         $invoicedata['reference'] = $request->input("reference");
         $invoicedata['terms_and_conditions	'] = $request->input("terms_and_conditions");

         $invoice = invoice::create($invoicedata);

         foreach (json_decode($invoiceitem) as $item){
            $itemdata['product_id'] = $item->id;
            $itemdata['invoice_id'] = $invoice->id;
            $itemdata['quantity'] = $item->quantity;
            $itemdata['unit_price'] = $item->unit_price;
           
            invoiceItem::create($itemdata);

         }
         return response()->json($invoice);


        
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