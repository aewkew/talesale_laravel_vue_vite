<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\Counter;
use App\Models\invoiceItem;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

// Get the currently authenticated user...
$user = Auth::user();
 
// Get the currently authenticated user's ID...
$id = Auth::id();

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
            $invoice->user_id      = $request->user_id;
            $invoice->sub_total    = $request->sub_total;
            $invoice->tax_total    = $request->tax_total;
            $invoice->total        = $request->total;
            $invoice->save();

            $success = true;
            $message = "success" ;


        }catch (\Illuminate\Database\QueryException $ex) {
            $success = "false";
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
       
        
    }  
    public function add_multi_invoice(Request $request){
        try{
                 $test =invoice::orderBy('id','desc')->take(1)->get();  

                $invoiceitem=new invoiceItem; 
                $invoiceitem->invoice_id = $test[0]->id;
                $invoiceitem->product_id = $request->product_id;
                $invoiceitem->unit_price = $request->unit_price; 
                $invoiceitem->quantity = $request->quantity;  
                $invoiceitem->save();  
                
                
            $success = true;
            $message = "Success" ;

   
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
    
   public function test_order(){
     $test=invoice::orderBy('id','desc')->take(1)->get(); 
     return response()->json($test);
   }
   

    public function invoiceItem(Request $request){
       
            $invoiceitem =$request->input("invoice_item");

            $invoicedata['subtotal'] = $request->input("subtotal");
            $invoicedata['number'] = $request->input("number");
            $invoicedata['customer_id'] = $request->input("customer_id");
            $invoicedata['date'] = $request->input("date");
            $invoicedata['due_date'] = $request->input("due_date");
            
            $invoicedata['tax_total'] = $request->input("tax_total");
            $invoicedata['total'] = $request->input("total");

            $invoice = invoice::create($invoicedata);
             
            foreach (json_decode($invoiceitem) as $item){
                $itemdata['product_id'] = $item->id;

                $itemdata['invoice_id'] = $invoice->id;

                $itemdata['quantity'] =  $item->quantity;
                $itemdata['unit_price'] =  $item->unit_price;
              
                invoiceItem::create($itemdata);

            }
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
          //  'discount' => 0,
      //      'term_and_conditions' => 'Default Terms and Conditions',
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
     
   public function where_sucess(){
    $success = DB::table('customers')->orderBy('due_date','ASC')
        ->join('invoices','customers.id','=','invoices.customer_id')
        ->where('status','success')->get();
    return response()->json([
        'success_inv' => $success,
        'message' => 'success_inv' 
   ]);

   }
   public function where_pending(){
    $pending = DB::table('customers')->orderBy('due_date','ASC')
        ->join('invoices','customers.id','=','invoices.customer_id')
        ->where('status','pending')->get();
    return response()->json([
        'pending_inv' => $pending,
        'message' => 'pending_inv' 
   ]);
   }
   public function where_cancelled(){
    $cancelled = DB::table('customers')->orderBy('due_date','ASC')
        ->join('invoices','customers.id','=','invoices.customer_id')
        ->where('status','cancelled')->get();
    return response()->json([
        'cancel_inv' => $cancelled,
        'message' => 'cancel_inv' 
   ]);
   }

   public function month_where_pending(){
    $month = Carbon::now()->format('m');
    $year = Carbon::now()->format('Y');
    $pending = DB::table('customers')->orderBy('due_date','ASC')
        ->join('invoices','customers.id','=','invoices.customer_id')  
        ->where('status','pending')
        ->whereYear('due_date','=', $year)
        ->whereMonth('due_date','=', $month)
        ->get();
    return response()->json([
        'pending_month' => $pending,
        'message' => 'pending_inv' 
   ]);
   }
   


    public function invoices_join(){
    
        $result = DB::table('customers')->orderBy('due_date','ASC')
        ->join('invoices','customers.id','=','invoices.customer_id')
        ->get();
        $result2 = DB::table('invoice_items')
        //->join('invoices','customers.id','=','invoices.customer_id')
         ->join('invoices','invoices.id','=','invoice_items.invoice_id')
         ->join('products','products.id','=','invoice_items.product_id')
         ->get();
        return response()->json(
            [
             'invoices2' => $result2,
             'invoices' => $result,
             'message' => 'invoicesDeal',
            
        ]);
        }
        


        public function all_invoice(){
            $result = DB::table('invoice_items')
           //->join('invoices','customers.id','=','invoices.customer_id')
            ->join('invoices','invoices.id','=','invoice_items.invoice_id')
            ->join('products','products.id','=','invoice_items.product_id')
            ->get();
           
            return response()->json(
                [
                 'invoices' => $result,
           
                 'message' => 'invoicesDeal',
                 'code' => 200
            ]);
            
        }
        public function group_item(){
            $result = DB::table('invoices')
           //->join('invoices','customers.id','=','invoices.customer_id')
            ->join('invoice_items','invoices.id','=','invoice_items.invoice_id')
            ->join('products','products.id','=','invoice_items.product_id')
            ->join('customers','customers.id','=','invoices.customer_id')
            //->select('invoices.id')
            ->get();
            return response()->json(
                [
                 'group_item' => $result,
                 'message' => 'invoicesDeal',
                 'code' => 200
            ]);
        }

        public function groupInv_notti(){
            
            $result = DB::table('invoices')
            ->where('details', '<>', '', 'and')
            ->join('customers','customers.id','=','invoices.customer_id')
            ->orderBy('follow','DESC')
            ->get();
            return response()->json(
                [
                 'group_noti' => $result,
                 'message' => 'invoicesDeal',
                 'code' => 200
            ]);
        }


        public function group_item_ch($id){
            $invoice_items = DB::table('invoice_items')
          //  ->join('customers','customers.id','=','invoices.customer_id')
            ->join('invoices','invoices.id','=','invoice_items.invoice_id')
            ->join('products','products.id','=','invoice_items.product_id')
            ->select('invoices.id','invoice_items.invoice_id','invoice_items.quantity'
                     ,'invoice_items.unit_price','invoice_items.product_id',
                    'products.product_name','products.product_brand','products.product_color',
                    'products.product_price','products.product_id')
            ->where('invoice_id','=',$id)
            ->get()->groupBy('invoice_id');
            return response()->json([
            'group_item' => $invoice_items,
            'message' => 'invoicesDeal',
            'code' => 200 
            ]);      
        }

        public function group_item_count($id){
            $invoice_items = DB::table('invoice_items')
          //  ->join('customers','customers.id','=','invoices.customer_id')
            ->join('invoices','invoices.id','=','invoice_items.invoice_id')
            ->join('products','products.id','=','invoice_items.product_id')
            ->where('invoices.customer_id','=',$id)
           ->groupBy('product_color','product_brand')
             ->select(DB::raw('SUM(quantity)as sum_tatol'),'product_color','product_brand')
             ->orderBy('sum_tatol','DESC')
             ->get();
            return response()->json([
            'group_count' => $invoice_items,
            'message' => 'Count_color',
            'code' => 200 
            ]);      
        }

        public function get_all_invoice($id){
            $invoices= invoice::find($id); 
             DB::table('invoice_items')
            ->join('invoices','invoices.id','=','invoice_items.invoice_id')
            ->get();
            return response()->json($invoices);        
        }

        public function Inv_cus($id){
            $InvCus=DB::table('invoices')
            ->join('customers','customers.id','=','invoices.customer_id') 
            ->select('customers.id','customers.customer_name','customers.customer_address','customers.customer_phone')
            ->where('invoices.id','=',$id)
            ->get();
            return response()->json([
                 'InvCus' => $InvCus ,
                 'message' => 'invoicesDeal',
                 'code' => 200
            ]);
         }

         public function invioce_cus($id){
            $invoice= invoice::where('customer_id', $id)
         
            ->where('status','success')
            ->get(); 
            return response()->json ([
                'invoice_cus' => $invoice,
                'message' => 'invoice_cus',
                'code' => 200
            ]);
         }


        public function updateInvoice($id, Request $request){
            $invoice= invoice::where('id', $id)->first();
            //$product->product_id           = $request->product_id;
            $invoice->status         = $request->status;
            $invoice->save();
            return response()->json([
               'message' => 'Invoice Update Success ',
               'code' => 200
           ]);
        }

        public function updateInv_follow($id, Request $request){
            $invoice= invoice::where('id', $id)->first();
            //$product->product_id           = $request->product_id;
            $invoice->follow        = $request->follow;
            $invoice->details         = $request->details;
            $invoice->save();
            return response()->json([
               'message' => 'Notification success',
               'code' => 200
           ]);
        }

       public function sum_month(){
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $invoice= invoice::where('status','success')
        ->whereYear('invoices.updated_at','=', $year)
        ->whereMonth('invoices.updated_at','=', $month)
       // ->groupBy('total')
         ->select(DB::raw('SUM(sub_total)as sum_sub'),DB::raw('SUM(tax_total)as sum_tax'),DB::raw('SUM(total)as sum_total'))
        // ->select(DB::raw('ROUND(sum_sub,2)as sum_sub'),DB::raw('ROUND(tax_total)as sum_tax'),DB::raw('ROUND(total)as sum_total'))
        ->get(); 
        return response()->json($invoice
          );
       }


       public function sum_employee(){
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $inv_cus=DB::table('invoices')
           ->join('users','users.id','=','invoices.user_id')
           ->select('users.name','invoices.total','invoices.status','invoices.updated_at','invoices.user_id') 
         // ->get()
            ->where('status','success')
            ->whereYear('invoices.updated_at','=', $year)
            ->whereMonth('invoices.updated_at','=', $month)
            ->groupBy('name')
            ->select(DB::raw('SUM(total)as sum_total'),DB::raw('SUM(total*5/100)as sum_com '),'name')
            ->orderBy('sum_com','DESC')
            ->get() 
            ;
        return response()->json([
           'sum_employee' => $inv_cus,
           'code' => 200
        ]);
       }
       
      

}
