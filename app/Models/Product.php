<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
   protected $table = 'products';
  /*   protected $primarykey = 'id';  */
    protected $fillable = ['product_id','name', 'brand', 'color', 'price'];
    use HasFactory;

  public function history_dealings(){
    
  }

}
