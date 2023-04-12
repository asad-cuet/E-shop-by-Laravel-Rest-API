<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order=Order::where('status',0)->orderBy('id','DESC')->get();
        return view('admin.order.order',['order'=>$order,'status'=>0]);
    }


    public function view_order($order_id)
    {
        $order=Order::where('id',$order_id)->first();
        return view('admin.order.view-order',['order'=>$order]);
    }


    public function update_order(Request $request,$order_id)
    {
        $order=Order::find($order_id);
        $order->status=$request->input('order_status');
        $order->update();
        return redirect('orders')->with('status','Order Status Updated Successfully');
    }

    public function order_history()
    {
        $order=Order::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.order.order',['order'=>$order,'status'=>1]);
    }
}
