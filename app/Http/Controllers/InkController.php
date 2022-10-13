<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ink;

class InkController extends Controller
{
    //Display
    public function inks()
    {
        $inks = Ink::all(['ink_id','ink_name','ink_price']);
        return response()->json($inks);

    }

    #store create
    public function store(Request $request)
    {
        $ink = Ink::create($request->post());
        return response()->json([
            'message'=>'Ink Created Successfully!!',
            'inks'=>$ink
        ]);
    }


    public function show(Ink $ink)
    {
        return response()->json($ink);
    }


    public function update(Request $request, Ink $ink)
    {
        $ink->fill($request->post())->save();
        return response()->json([
            'message'=>'Ink Updated Successfully!!',
            'category'=>$ink
        ]);
    }
}
