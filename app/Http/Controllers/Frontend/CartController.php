<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
          $product_id=$request->input('product_id');
          $product_qty=$request->input('product_qty');

          if(Auth::check())
          {
              $prod_check=Product::where('id',$product_id)->first();
              if($prod_check)
              {
                  if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                  {
                    return response()->json(['status'=>$prod_check->name.' Has Already Added to Cart']);
                  }
                  else
                  {
                  $cartItem=new Cart();
                  $cartItem->user_id=Auth::id();
                  $cartItem->prod_id=$request->input('product_id');
                  $cartItem->prod_qty=$request->input('product_qty');
                  $cartItem->save();
                  return response()->json(['status'=>$prod_check->name.' Added to Cart']);
                  }
              }
          }
          else
          {
              return response()->json(['status'=>'Login to Continue']);
          }
    }



    public function viewCart()
    {
        $product=Cart::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.cart',['product'=>$product]);
    }


    public function deleteCartItem(Request $request)
    {
        $cart_id=$request->input('cart_id');
        $cartItem=Cart::where('id',$cart_id)->first();
        $cartItem->delete();
        return response()->json(['status'=>'Product Deleted Successfully']);
    }

    public function updateCart(Request $request)
    {
        $cart_id=$request->input('cart_id');
        $prod_qty=$request->input('prod_qty');
        if(Cart::where('id',$cart_id)->exists())
        {
            $cart=Cart::where('id',$cart_id)->first();
            if(($cart->product->qty) >= ($prod_qty))
            {
                $cart->prod_qty=$prod_qty;
                $cart->update();
     
                $cart2=Cart::where('user_id',Auth::id())->get();
                $total=0;
                foreach($cart2 as $item)
                {
                     $total+=($item->product->selling_price)*($item->prod_qty);
                } 
                return response()->json(['status'=>$total]);
            }
            else
            {
                return response()->json(['status'=>'out_of_stock']);
            }

        }
    }


    public function load_cart_data()
    {
        if(Auth::check())
        {
            $cartcount=Cart::where('user_id',Auth::id())->count();
            $wishcount=Wishlist::where('user_id',Auth::id())->count();
            return response()->json(['cartcount'=>$cartcount,'wishcount'=>$wishcount]);
        }

    }


}
