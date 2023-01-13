<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\follow_customer;
use Illuminate\Support\Facades\DB;

class FollowCustomerController extends Controller
{
    //
      
    public function follow_customer(){
        $follow_customer = follow_customer::all();
        return response()->json(
            [
             'follow_customer' => $follow_customer,
             'message' => 'follow_customer',
             'code' => 200
        ]
    );

    }   
    public function join_follow(){
        $follow = DB::table('follow_customers')
        ->join('users','users.id','=','follow_customers.follow_user_id')
        ->join('customers','customers.id','=','follow_customers.follow_customer_id')
        ->select('users.name','users.phone','customers.customer_name','customers.customer_phone','details','follow','follow_customers.id')
        ->get();

        return response()->json([
            'follow_join' => $follow,
            'message' => 'follow_customer',
            'code' => 200
        ]);
    }
    public function delete_follow($id){
       $follow = follow_customer::find($id);
        try{
            
            $follow->delete();
            $success = true;
            $message = "Add Follow successfully";
        }catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($response);
       
    }
    
    public function add_follow(Request $request){
        try{
            $follow = new follow_customer();
            $follow->follow_user_id = $request->follow_user_id;
            $follow->follow_customer_id = $request->follow_customer_id;
            $follow->follow = $request->follow;
            $follow->details = $request->details;
            $follow->save();

            $success = true;
            $message = "Add Follow successfully";
        }catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($response);
    }
}
