<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\HistoryDealingController;

//get 

//product
Route::get('/', [PostsController::class,'index']);
Route::get('products', [ProductController::class,'products']);
Route::post('addproduct', [ProductController::class,'addproduct']);
Route::get('getproduct/{id}', [ProductController::class,'getproduct']);
Route::post('updateProduct/{id}', [ProductController::class,'updateProduct']);
Route::delete('deleteProduct/{id}',[ProductController::class,'deleteProduct']);

//Route::get('iner-join', [ProductController::class,'innerJoin']);


//customer 
Route::get('customers', [CustomerController::class,'customers']);
Route::post('addcustomers', [CustomerController::class,'addcustomers']);
Route::get('getcustomers/{id}', [CustomerController::class,'getcustomers']);
Route::post('updateCustomer/{id}', [CustomerController::class,'updateCustomer']);
Route::delete('deleteCustomer/{id}',[CustomerController::class,'deleteCustomer']);

//company
Route::get('companies', [CompanyController::class,'companies']);
Route::post('addCompanies', [CompanyController::class,'addCompanies']);
Route::get('getCompanies/{id}', [CompanyController::class,'getCompanies']);
Route::post('updateCompany/{id}', [CompanyController::class,'updateCompany']);
Route::delete('deleteCompany/{id}', [CompanyController::class,'deleteCompany']);



// user
Route::get('user', [UserController::class,'user']);
Route::get('userid/{id}', [UserController::class,'userid']);

//register&login
Route::post('login', [UserController::class, 'login']);
Route::post('register_user', [UserController::class, 'register_user']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum'); 
Route::post('editUser/{id}', [UserController::class,'editUser']);

//Join

Route::get('hisdeal',[HistoryDealingController::class,'hisdeal']);

Route::get('iner-join',[HistoryDealingController::class,'innerJoin']);
Route::get('iner-join_his',[HistoryDealingController::class,'innerJoinhis']);





Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});  



