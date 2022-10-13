<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ink;

class InkController extends Controller
{
    //
    public function inks()
    {
        $inks = Ink::all();
        return response()->json($inks);
    }
}
