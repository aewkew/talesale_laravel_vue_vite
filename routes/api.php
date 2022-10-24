<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

//get 

Route::get('user', [UserController::class,'user']);
Route::get('/', [PostsController::class,'index']);
Route::get('products', [ProductController::class,'products']);


// save 

Route::post('addproduct', [ProductController::class,'addproduct']);

// edit
Route::get('getproduct/{id}', [ProductController::class,'getproduct']);
Route::post('updateProduct/{id}', [ProductController::class,'updateProduct']);

// Delete
Route::delete('deleteProduct/{id}',[ProductController::class,'deleteProduct']);

//register&login
Route::post('login', [UserController::class, 'login']);
Route::post('register_user', [UserController::class, 'register_user']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum'); 






Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});  



