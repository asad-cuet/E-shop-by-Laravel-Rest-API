<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems=Cart::where('user_id',Auth::id())->get();

        
        
        foreach($old_cartitems as $item)
        {
           
            if(Product::where('id',$item->prod_id)->where('qty','<',$item->prod_qty)->exists())
            {
                // $p=Product::where('id',$item->prod_id)->where('qty','<',$item->prod_qty)->first();
                // dd('id='.$p->id.' qty='.$p->qty.' ordered q='.$item->prod_qty);

                $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontend/checkout',['cartitems'=>$cartitems]);
    }


    public function placeOrder(Request $request)
    {
         if(!Cart::where('user_id',Auth::id())->exists())
         {
            return redirect('/')->with('status','Add Product to Cart first!');
         }
        

         $cartitems=Cart::where('user_id',Auth::id())->get();
         $total_price=0;
         foreach($cartitems as $item)
         {
             $total_price+=($item->product->selling_price) * ($item->prod_qty);

         }     
         


         $order=new Order();
         $order->user_id = Auth::id();
         $order->fname = $request->input('fname');
         $order->lname = $request->input('lname');
         $order->email = $request->input('email');
         $order->phone = $request->input('phone');
         $order->address1 = $request->input('address1');
         $order->address2 = $request->input('address2');
         $order->city = $request->input('city');
         $order->state = $request->input('state');
         $order->country = $request->input('country');
         $order->pincode = $request->input('pincode');
         $order->total_price = $total_price;
         $order->tracking_no = 'asad'.rand(1111,9999);

         $order->payment_mode=$request->input('payment_mode');
         $order->payment_id=$request->input('payment_id');
         $order->save();

        
         foreach($cartitems as $item)
         {
             OrderItem::create([
                 'order_id'=>$order->id,
                 'prod_id'=>$item->prod_id,
                 'qty'=>$item->prod_qty,
                 'price'=>$item->product->selling_price,
             ]);

             //reducing quantity
             $prod=Product::where('id',$item->prod_id)->first();
             $prod->qty=$prod->qty - $item->prod_qty;
             $prod->update();
         }   
         
         
         if(Auth::user()->address1==NULL)
         {
             $user=User::where('id',Auth::id())->first();
             $user->fname = $request->input('fname');
             $user->lname = $request->input('lname');
             $user->phone = $request->input('phone');
             $user->address1 = $request->input('address1');
             $user->address2 = $request->input('address2');
             $user->city = $request->input('city');
             $user->state = $request->input('state');
             $user->country = $request->input('country');
             $user->pincode = $request->input('pincode');
             $user->update();
         }

         $cartitems=Cart::where('user_id',Auth::id())->get();
         Cart::destroy($cartitems);



         if($request->input('payment_mode')=="Paid by Razorpay" || $request->input('payment_mode')=="Paid by Paypal")
         {
             return response()->json(['status'=>'Order Placed Successfully']);
         }
         
         return redirect('/')->with('status','Order Placed Successfully');
         
    }

    public function razorpay_Check(Request $request)
    {
        $cartitems=Cart::where('user_id',Auth::id())->get();
        $total_price=0;
        foreach($cartitems as $item)
        {
            $total_price+=($item->product->selling_price) * ($item->prod_qty);
        }   
        $fname= $request->input('fname');
        $lname= $request->input('lname');
        $email= $request->input('email');
        $phone= $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city= $request->input('city');
        $state= $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');
        return response()->json([
            'fname'=>$fname,
            'lname'=>$lname,
            'email'=>$email,
            'phone'=>$phone,
            'address1'=>$address1,
            'address2'=>$address2,
            'city'=>$city,
            'state'=>$state,
            'country'=>$country,
            'pincode'=>$pincode,
            'total_price'=>$total_price
        ]);
    }


}
