<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

//get 

//product
Route::get('/', [PostsController::class,'index']);
Route::get('products', [ProductController::class,'products']);
Route::post('addproduct', [ProductController::class,'addproduct']);
Route::get('getproduct/{id}', [ProductController::class,'getproduct']);
Route::post('updateProduct/{id}', [ProductController::class,'updateProduct']);
Route::delete('deleteProduct/{id}',[ProductController::class,'deleteProduct']);


//customer 
Route::get('customers', [CustomerController::class,'customers']);
Route::post('addcustomers', [CustomerController::class,'addcustomers']);
Route::get('getcustomers/{id}', [CustomerController::class,'getcustomers']);
Route::delete('deleteCustomer/{id}',[CustomerController::class,'deleteCustomer']);




// user
Route::get('user', [UserController::class,'user']);




//register&login
Route::post('login', [UserController::class, 'login']);
Route::post('register_user', [UserController::class, 'register_user']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum'); 






Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});  



