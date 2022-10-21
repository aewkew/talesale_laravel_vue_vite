<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

  public function users(){
    $users = User::all();
    return response()->json(
        [
        'users' => $users,
         'message' => 'User',
         'code' => 200
    ]
);
}
    
    public function login(Request $request)
    {
       $credentials = [
        'email' => $request->email,
        'password' => $request->password
       ];
       if(Auth::attempt($credentials )) {
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




    public function register(Request $request){
       
            $user = new User();
            $user->name = $request->name;
            $user->name = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
              'message' => 'product Create Success ',
               'code' => 200
          ]);
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

    
}
