<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FollowCustomerController;
use App\Http\Controllers\HistoryDealingController;

//get 

//product
Route::get('/', [PostsController::class,'index']);
Route::get('products', [ProductController::class,'products']);
Route::post('addproduct', [ProductController::class,'addproduct']);
Route::get('getproduct/{id}', [ProductController::class,'getproduct']);
Route::post('updateProduct/{id}', [ProductController::class,'updateProduct']);
Route::delete('deleteProduct/{id}',[ProductController::class,'deleteProduct']);
//search
Route::get('search_color',[ProductController::class,'search_color']);
Route::get('search_brand',[ProductController::class,'search_brand']);
Route::get('search_id',[ProductController::class,'search_id']);
//cart product

Route::post('addCart', [ProductController::class,'addCart']);

//Route::get('iner-join', [ProductController::class,'innerJoin']);


//customer 
Route::get('customers', [CustomerController::class,'customers']);
Route::post('addcustomers', [CustomerController::class,'addcustomers']);
Route::get('getcustomers/{id}', [CustomerController::class,'getcustomers']);
Route::post('updateCustomer/{id}', [CustomerController::class,'updateCustomer']);
Route::delete('deleteCustomer/{id}',[CustomerController::class,'deleteCustomer']);
Route::get('searchCus_tel', [CustomerController::class,'searchCus_tel']);
Route::get('invioce_cus/{id}', [InvoiceController::class,'invioce_cus']);
Route::get('group_item_count/{id}', [InvoiceController::class,'group_item_count']);


Route::get('follow_customer', [FollowCustomerController::class,'follow_customer']);
Route::post('add_follow', [FollowCustomerController::class,'add_follow']);
Route::get('join_follow', [FollowCustomerController::class,'join_follow']);
Route::delete('delete_follow/{id}', [FollowCustomerController::class,'delete_follow']);
Route::get('follow_month', [FollowCustomerController::class,'follow_month']);

//company
Route::get('companies', [CompanyController::class,'companies']);
Route::post('addCompanies', [CompanyController::class,'addCompanies']);
Route::get('getCompanies/{id}', [CompanyController::class,'getCompanies']);
Route::post('updateCompany/{id}', [CompanyController::class,'updateCompany']);
Route::delete('deleteCompany/{id}', [CompanyController::class,'deleteCompany']);

//invoice
Route::get('invoices', [InvoiceController::class,'invoices']);
Route::post('add_invoice', [InvoiceController::class,'add_invoice']);
Route::get('create_invoice', [InvoiceController::class,'create_invoice']);
Route::get('invoices_join', [InvoiceController::class,'invoices_join']);
Route::get('invoices_cus', [InvoiceController::class,'invoices_cus']);
Route::get('all_invoice', [InvoiceController::class,'all_invoice']);
Route::get('get_all_invoice/{id}', [InvoiceController::class,'get_all_invoice']);
Route::post('updateInvoice/{id}', [InvoiceController::class,'updateInvoice']);
Route::get('group_item', [InvoiceController::class,'group_item']);
Route::get('test_order', [InvoiceController::class,'test_order']);
Route::get('group_item_ch/{id}', [InvoiceController::class,'group_item_ch']);
Route::post('updateInv_follow/{id}', [InvoiceController::class,'updateInv_follow']);
Route::get('groupInv_notti', [InvoiceController::class,'groupInv_notti']);
Route::get('sum_month', [InvoiceController::class,'sum_month']);
Route::get('sum_employee', [InvoiceController::class,'sum_employee']);

Route::get('comis_total', [ChartController::class,'comis_total']);
Route::get('test_date', [ChartController::class,'test_date']);
Route::get('color_select', [ChartController::class,'color_select']);
Route::get('selcet_chart', [ChartController::class,'selcet_chart']);

Route::get('total_chart', [ChartController::class,'total_chart']);

Route::get('where_sucess', [InvoiceController::class,'where_sucess']);
Route::get('where_pending', [InvoiceController::class,'where_pending']);
Route::get('where_cancelled', [InvoiceController::class,'where_cancelled']);
Route::get('month_where_pending', [InvoiceController::class,'month_where_pending']);



//invoice_Item
//Route::get('invoiceItem/{invoice_id}', [InvoiceItemController::class,'invoiceItem']);
Route::get('all_customer', [CustomerController::class,'all_customer']);
Route::post('test_invoice', [InvoiceController::class,'test_invoice']);
Route::post('invoiceItem', [InvoiceController::class,'invoiceItem']);
Route::post('add_multi_invoice', [InvoiceController::class,'add_multi_invoice']);
Route::get('Inv_cus/{id}', [InvoiceController::class,'Inv_cus']);

Route::get('invoice_item', [ChartController ::class,'invoice_item']);
Route::get('color_coute', [ChartController ::class,'color_coute']);
Route::get('color_chrat', [ChartController ::class,'color_chrat']);
Route::get('total_chart', [ChartController ::class,'total_chart']);



// user
Route::get('user', [UserController::class,'user']);
Route::get('userid/{id}', [UserController::class,'userid']);

//register&login
Route::post('login', [UserController::class, 'login']);
Route::post('register_user', [UserController::class, 'register_user']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum'); 
Route::post('editUser/{id}', [UserController::class,'editUser']);


Route::get('invoices_join', [InvoiceController::class,'invoices_join'])->middleware('auth');


Route::middleware('auth:sanctum')->get('/', function (Request $request) {
   
    return $request->user();
});  



