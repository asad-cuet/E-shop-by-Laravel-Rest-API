<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class PdfController extends Controller
{
    public function order($order_id)
    {
        $order=Order::where('id',$order_id)->first();
        $pdf=PDF::loadView('admin.order.pdf',['order'=>$order])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('order.pdf');
      // return view('admin.order.pdf',['order'=>$order]);
    }
}
