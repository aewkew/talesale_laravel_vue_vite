<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyDealing extends Model
{
    use HasFactory;
    protected $table = 'history_dealings';
    protected $fillable = ['product_id', 'user_id', 'customer_id'];
}