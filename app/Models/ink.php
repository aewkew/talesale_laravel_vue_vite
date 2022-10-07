<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ink extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ink_id','ink_name','price'
    ];
}
