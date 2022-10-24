<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
   
    
   protected $table = 'products';
  /*   protected $primarykey = 'id';  */
    protected $fillable = ['name', 'brand', 'color', 'price'];
    use HasFactory;
}
