<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class customercontroller extends Controller
{     
     public function get_all_customer(){
        $customer = customer::all();
        return response() ->json([
            'customer' => $customer
        ],200);
     }
}
