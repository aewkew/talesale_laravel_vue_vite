<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follow_dealing extends Model
{
    use HasFactory;
    protected $table = 'follow_dealings';
    protected $fillable = ['user_id', 'product_id', 'customer_id','status'];
}
