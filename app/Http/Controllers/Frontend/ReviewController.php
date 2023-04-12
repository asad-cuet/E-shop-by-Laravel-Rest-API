<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function index($slug)
    {
          $product_check=Product::where('slug',$slug)->first();
          $review_check=Review::where('user_id',Auth::id())->where('prod_id',$product_check->id)->exists();
          if($review_check)
          {
              return redirect()->back()->with('status',"You cannot review a product two times");
          }
          else
          {
                if($product_check)
                {
                    $product_id=$product_check->id;
                    $verified_purchase=Order::where('orders.user_id',Auth::id())
                                            ->join('order_items','orders.id','order_items.order_id')
                                            ->where('order_items.prod_id',$product_id)->get();
                    return view('frontend.review.index',['product'=>$product_check,'verified_purchase'=>$verified_purchase]);
                }
                else
                {
                    return redirect()->back()->with('status',"The link you followed was broken");
                }
          } 

    }


    public function add_review(Request $request)
    {
        $product_id=$request->input('product_id');
        $review_check=Review::where('user_id',Auth::id())->where('prod_id',$product_id)->exists();
        if($review_check)
        {
            return redirect()->back()->with('status',"You cannot review a product two times");
        }
        else
        {
            $product=Product::where('id',$product_id)->first();
            if($product)
            {
                $user_review=$request->input('user_review');
                $new_review=Review::create([
                        'user_id'=>Auth::id(),
                        'prod_id'=>$product_id,
                        'user_review'=>$user_review,
                ]);

                if($new_review)
                {
                    $category_slug=$product->category->slug;
                    $prod_slug=$product->slug;
                    return redirect('/category/'.$category_slug.'/'.$prod_slug)->with('status',"Thank you for Review");
                }
            }
            else
            {
                return redirect()->back()->with('status',"The link you followed was broken");
            }

        }

    }


    public function edit_review($slug)
    {
        $product=Product::where('slug',$slug)->first();
        if($product)
        {
            $product_id=$product->id;
            $review=Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($review)
            {
                return view('frontend.review.edit',['review'=>$review]);
            }
            else
            {
                return redirect()->back()->with('status',"The link you followed was broken");
            }
        }
        else
        {
            return redirect()->back()->with('status',"The link you followed was broken");
        }
    }

    public function update(Request $request)
    {
        $user_review=$request->input('user_review');
        if($user_review!='')
        {
            $review_id=$request->input('review_id');
            $review=Review::where('id',$review_id)->where('user_id',Auth::id())->first();
            if($review)
            {
                $review->user_review=$request->input('user_review');
                $review->update();
                return redirect('/category/'.$review->product->category->slug.'/'.$review->product->slug)->with('status',"Review Updated Successfully");
            }
            else
            {
                return redirect()->back()->with('status',"The link you followed was broken");
            }
        }
        else
        {
            return redirect()->back()->with('status',"You cannot submit a empty review");
        }

    }

}
