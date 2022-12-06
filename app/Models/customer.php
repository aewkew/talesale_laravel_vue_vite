<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{    
    protected $table = 'customers';
    protected $fillable= ['company_id','customer_id','customer_name','customer_address','phone'];
    use HasFactory;
}
