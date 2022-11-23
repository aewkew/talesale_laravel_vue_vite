<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\Counter;
use App\Models\invoiceItem;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
         try{

            $invoice=new invoice();
            $invoice->number       = $request->number;
            $invoice->customer_id  = $request->customer_id;
            $invoice->date         = $request->date;
            $invoice->due_date     = $request->due_date;
            $invoice->terms_and_conditions  = $request->terms_and_conditions;
            $invoice->sub_total    = $request->sub_total;
            $invoice->tax_total    = $request->tax_total;
            $invoice->total        = $request->total;
            $invoice->save();
            $invoices =invoice::orderBy('id','desc')->take(1)->get();
             /*
            $invoiceitem=new invoiceItem();  
            $invoiceitem->invoice_id  = $request->$invoices[0]->id;
            $invoiceitem =  json_decode(request('product_id'));
            $invoiceitem = json_decode(request('unit_price')); 
            $invoiceitem =  json_decode(request('quantity'));

            $invoiceitem->save();   
            
                   /*
            $invoiceitem= $request->input("invoice_item");
            foreach ( $invoiceitem as $item){
                $itemdata['product_id'] = $item->id;
                $itemdata['invoice_id'] = $item->$invoices[0]->id;
                $itemdata['unit_price'] = $item->unit_price; 
                $itemdata['quantity'] = $request->quantity; 
                invoiceItem::create($itemdata);
            } */

            $invoiceitem=new invoiceItem(); 
            $invoiceitem->invoice_id  = $request->$invoices[0]->id;
            $invoiceitem->product_id = $request->product_id;
            $invoiceitem->unit_price = $request->unit_price; 
            $invoiceitem->quantity = $request->quantity;  
            $invoiceitem->save(); 
             
      
            /*
            $invoiceitem=new invoiceItem();
            $invoiceitem->invoice_id  = $request->$invoices[0]->id;
            $invoiceitem->product_id = $request->product_id;
            $invoiceitem->unit_price = $request->unit_price; 
            $invoiceitem->quantity = $request->quantity;  
            $invoiceitem->save(); */

   
            $success = true;
            $message = '';
            
           // $message = 'Invoice & itemId Success';
          //  echo("<script>Console.log($invoices)</script>");
    

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

    public function invoiceItem(Request $request){
        try{

            $invoices =invoice::orderBy('id','desc')->take(1)->get();
             
            $invoiceitem=new invoiceItem();  
            $invoiceitem->invoice_id  = $request->$invoices[0]->id;
            $invoiceitem =  json_decode(request('product_id'));
            $invoiceitem = json_decode(request('unit_price')); 
            $invoiceitem =  json_decode(request('quantity'));
            $invoiceitem->save();  

             /*
            $invoiceitem=new invoiceItem();
            $invoiceitem->invoice_id  = $request->$invoices[0]->id;
            $invoiceitem->product_id = $request->product_id;
            $invoiceitem->unit_price = $request->unit_price; 
            $invoiceitem->quantity = $request->quantity;  
            $invoiceitem->save(); */

            $success = true;
            $message = '';
            
           // $message = 'Invoice & itemId Success';
          //  echo("<script>Console.log($invoices)</script>");
    

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
