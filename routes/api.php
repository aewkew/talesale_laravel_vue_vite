<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\customercontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InkController;

//get 
Route::get('products', [ProductController::class,'products']);

// save 
Route::post('addproduct', [ProductController::class,'addproduct']);

// edit
Route::put('editproduct', [ProductController::class,'editproduct']);

// Delete
Route::delete('deleteProduct/{id}',[ProductController::class,'deleteProduct']);


Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});
