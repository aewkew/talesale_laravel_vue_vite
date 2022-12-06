<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceItem extends Model
{    use HasFactory;
    protected $table = 'invoice_items';
   protected $fillable = array('invoice_id','product_id','unit_price', 'quantity');
  
}

