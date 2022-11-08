<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function customers(){
        $customer = Customer::all();
        return response()->json(
            [
             'customers' => $customer,
             'message' => 'Customer',
             'code' => 200
        ]
    );
    }    

    
    public function addcustomers(Request $request)
    {    
        try{
            $customer=new Customer();
           // $customer->customer_id   = $request->customer_id;
            $customer->customer_name          = $request->customer_name;
           // $customer->company_id	 = $request->company_id	;
            $customer->customer_address       = $request->customer_address;
            $customer->customer_phone         = $request->customer_phone;
            $customer->save();

            $success = true;
            $message = "Add Product successfully";
    

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


    public function getcustomers($id){  
        $customer=Customer::find($id);
        return response()->json($customer);
       
    }
    
    public function deleteCustomer($id) {
        $customer=Customer::find($id);
        if($customer->delete()){
             return response()->json([ 
               'message' => 'Product Delete SuccesFully',
                'code' => 200
           ]);
        }else {
           return response()->json([
               'message'=> 'Product with id:$id does not exits'
           ]);
        }
   }

   public function updateCustomer($id, Request $request){
    $customer= Customer::where('id', $id)->first();
    $customer->customer_name          = $request->customer_name;
   // $customer->company_id	           = $request->company_id;
    $customer->customer_address       = $request->customer_address;
    $customer->customer_phone         = $request->customer_phone;
    $customer->save();
    return response()->json([
       'message' => 'Customer Update Success ',
       'code' => 200
   ]);
    }

    public function searchCustomer(Request $request){
      $customer = Customer::where('customer_name','LIKE','%'.$request->keyword_cus.'%')->get();
      return response()->json($customer);
     }

 
}
