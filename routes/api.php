<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\customercontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InkController;

//get 
Route::get('/products', [ProductController::class,'product']);
Route::get('/inks', [InkController::class,'inks']);


// save 
Route::post('/addproduct', [ProductController::class,'addproduct']);

// edit
Route::get('/editproduct/{id}', [ProductController::class,'editproduct']);


Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});
