<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
 
  public function user(){
    $user = User::all();
    return response()->json(
        [
         'users' => $user,
         'message' => 'User',
         'code' => 200
    ]
);
} 
    
    public function login(Request $request)
    {
       $credentials = [
        'name' => $request->name,
        'password' => $request->password
       ];
       if(Auth::attempt($credentials)) {
         $succes = true;
         $message = "User login successfully";
       }else {
        $succes = false;
        $message = "Unautorised";
       }
       $response = [
         'success' => $succes,
         'message' => $message
       ];
        
       return response()->json($response);
    } 


    public function register_user(Request $request){
              
      try {
        $user = new User();
        $user->user_id = $request->user_id;
        $user->name    = $request->name;
        $user->phone   = $request->phone;
        $user->email   = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $success = true;
        $message = "User register successfully";

    } catch (\Illuminate\Database\QueryException $ex) {
        $success = false;
        $message = $ex->getMessage();
    }

    $response = [
        'success' => $success,
        'message' => $message
    ];

    return response()->json($response);
    }
    

       public function logout()
    {
         try{
           Session::flush();
           $succes = true;
           $message = "Logout success";
         }catch (\Illuminate\Database\QueryException $ex) {
              $succes  = false;
              $message = $ex->getMessage();
         }
         $response = [
            'success' => $succes,
            'message' => $message
          ];
           
          return response()->json($response);
    }
   
   
    
    public function userid($id){
      $user = User::find($id);
        return response()->json($user);
    }

    public function editUser($id, Request $request) {
      $user= User::where('id', $id)->first();
      $user->name          = $request->name;
      $user->email       = $request->email ;
      $user->phone        = $request->phone;
      $user->save();
      return response()->json([
         'message' => 'product Update Success ',
         'code' => 200
     ]);
    }
}
