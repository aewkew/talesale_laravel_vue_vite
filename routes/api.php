<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\customercontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InkController;

//Route::get('get_all_customer', [customercontroller::class,'get_all_customer']);

Route::get('/products', [ProductController::class,'product']);
Route::get('/inks', [InkController::class,'inks']);


// save Product
Route::post('/addproduct', [ProductController::class,'addproduct']);


Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});
