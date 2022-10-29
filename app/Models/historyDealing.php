<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;


class historyDealing extends Model
{
    use HasFactory;
    protected $table = 'history_dealings';
     protected $fillable = ['product_id', 'user_id', 'customer_id'];

    
    public function products(){
        return $this->hasMany(Product::class, 'product_id','id');
    }
   
    public function customers() {
        return $this->hasMany(Customer::class, 'customer_id','id');
    } 
    
}
