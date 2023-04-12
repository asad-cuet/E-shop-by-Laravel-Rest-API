<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderDetailsCollection;

class OrderController extends Controller
{
    public function proceedOrder(Request $request)
    {


        $new_order=new Order;
        $new_order->user_id=$request->user_id;
        $new_order->fname=$request->f_name;
        $new_order->lname=$request->l_name;
        $new_order->email=$request->email;
        $new_order->phone=$request->phone;
        $new_order->address1=$request->address1;
        $new_order->address2=$request->address2;
        $new_order->city=$request->city;
        $new_order->state=$request->state;
        $new_order->country=$request->country;
        $new_order->pincode=$request->pincode;
        $new_order->tracking_no=123;
        $new_order->payment_mode='COD';
        $new_order->save();

        $total_price=0;

        foreach($request->carts as $cart_item)
        {
            // return $cart_item['id'];
            $new_order_item=new OrderItem;
            $new_order_item->order_id=$new_order->id;
            $new_order_item->prod_id=$cart_item['id'];
            $new_order_item->qty=$cart_item['quantity'];
            $new_order_item->price=$cart_item['selling_price'];
            $new_order_item->save();

            $total_price+=$cart_item['quantity']*$cart_item['selling_price'];
        }

        $new_order->total_price=$total_price;
        $new_order->save();

        $response=[
            'success'=>true,
            'new_order'=>$new_order,
            'message'=>'Order created successfully',
        ];

        return response()->json($response,200);
    }

    public function myOrders(Request $request)
    {
        // return $request->user_id;
        $orders=Order::where('user_id',$request->user_id)->get();

        return new OrderCollection($orders);
    }
    public function orderInfo($order_id)
    {
        $order=Order::where('id',$order_id)->first();

        $response=[
            'success'=>true,
            'data'=>$order
        ];

        return response()->json($response,200);
    }


    public function myOrderDetails($order_id)
    {
        $order_items=OrderItem::where('order_id',$order_id)->get();

        return new OrderDetailsCollection($order_items);
    }
}
