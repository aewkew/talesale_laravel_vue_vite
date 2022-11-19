<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\invoice;

class invoiceItem extends Model
{   
    protected $table = 'invoice_items';
    protected $fillable = ['invoice_id','product_id','unit_price','quantity'];         
    use HasFactory;

    
    public function invoice(){
        return $this->hasMany(invoice::class, 'id','invoice_id');
    }
}
