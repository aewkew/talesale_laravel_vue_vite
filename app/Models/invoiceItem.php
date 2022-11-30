<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\invoice;

class invoiceItem extends Model
{   
    protected $table = 'invoice_items';
    protected $fillable = array('invoice_id','product_id','unit_price','quantity');         
    use HasFactory;

    
    public function posts(){
        return $this->hasManyThrough('id','invoice_id','product_id','unit_price','quantity');
    }
}
