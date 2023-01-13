<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follow_customer extends Model
{
    use HasFactory;
   
        protected $table = 'follow_customers';
        protected $fillable = ['user_id','customer_id','follow', 'details'];
   
}
