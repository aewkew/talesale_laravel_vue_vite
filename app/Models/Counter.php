<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    public function definition(){
        return [
            'key' => 'invoice',
            'prefix' => 'INV-',
            'value' => 20000
        ];
    }
}
