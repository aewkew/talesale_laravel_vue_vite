<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\ProductController;


Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');  

