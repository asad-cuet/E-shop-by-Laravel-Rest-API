<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $my_order=Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.order.my-order',['my_order'=>$my_order]); 
    }


    public function view_order($order_id)
    {
        $order=Order::where('id',$order_id)->where('user_id',Auth::id())->first();
        return view('frontend.order.view-order',['order'=>$order]);
    }
}
