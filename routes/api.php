<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\customercontroller;
use App\Http\Controllers\ProductController;


//Route::get('get_all_customer', [customercontroller::class,'get_all_customer']);

Route::get('/products', [ProductController::class,'product']);


Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});