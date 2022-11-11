<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = [ 'number',
                           'customer_id',
                           'date',
                           'due_date',
                           'reference',
                           'terms_and_conditions',
                           'sub_total',
                           'tax_total',
                           'discount',
                           'total',
                            ];
   
    public function customer(){
        return $this->belongsTo(Customer::class);
                }
                
        public function definition(){
                                return [
                                    'key' => 'invoice',
                                    'prefix' => 'INV-',
                                    'value' => 20000
                                ];
                            }

}
