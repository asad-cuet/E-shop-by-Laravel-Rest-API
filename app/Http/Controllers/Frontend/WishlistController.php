<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
      $wishlist=Wishlist::where('user_id',Auth::id())->orderBy('id','DESC')->get();
      return view('frontend.wishlist.wishlist',['wishlist'=>$wishlist]);
    }


    public function add_to_wishlist(Request $request)
    {
        if(Auth::check())
        {
            $prod_id=$request->input('prod_id');
            if(Product::find($prod_id))
            {
                if(!Wishlist::where('user_id',Auth::id())->where('prod_id',$prod_id)->exists())
                {
                    $wish=new Wishlist();
                    $wish->prod_id=$prod_id;
                    $wish->user_id=Auth::id();
                    $wish->save();
                    return response()->json(['status'=>"Product Added to Wishlist"]);
                }
                else
                {
                    return response()->json(['status'=>"Product has already added"]);
                }


            }
            else
            {
                return response()->json(['status'=>"Product doesn't exist"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function delete_wishlist_item(Request $request)
    {
        $wish_id=$request->input('wish_id');
        $wishItem=Wishlist::where('id',$wish_id)->first();
        $wishItem->delete();
        return response()->json(['status'=>'Product Deleted Successfully']);
    }
}
