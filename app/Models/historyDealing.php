<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;


class historyDealing extends Model
{
   
    protected $table = 'history_dealings';
     protected $fillable = ['invoice_id', 'user_id', 'customer_id'];

     use HasFactory;
    public function products(){
        return $this->hasMany(Product::class, 'invoice_id','id');
    }
   
    public function customers() {
        return $this->hasMany(Customer::class, 'customer_id','id');
    } 
    
}
