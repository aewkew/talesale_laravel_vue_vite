<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ink extends Model
{

    protected $table = 'inks';
    protected $primarykey = 'ink_id';
    protected $fillable= ['ink_name','ink_price'];
    use HasFactory;
}
