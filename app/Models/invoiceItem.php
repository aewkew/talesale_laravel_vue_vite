<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceItem extends Model
{    use HasFactory;
    protected $table = 'invoice_items';
    protected $fillable = ['invoice_id','product_id','unit_price','quantity'];         
   
   /*
    public function invoices(){
        return $this->hasMany(invoice::class, 'id','invoice_id','product_id','unit_price','quantity');
    } */
}

