<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\invoiceItem;

class InvoiceItemController extends Controller
{
    public function invoiceItem($id){
          $item_invoice=invoiceItem::find($id);
          return response()->json($item_invoice);

    }

}
