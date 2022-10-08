<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customercontroller;


Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');  