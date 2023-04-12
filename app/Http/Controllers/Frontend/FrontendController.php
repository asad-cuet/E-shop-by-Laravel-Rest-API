<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index() 
    {
        $feteared_product=Product::where('trending','1')->where('status',1)->take(15)->get();
        $trending_category=Category::where('popular','1')->where('status',1)->take(15)->get();
        return view('frontend/dashboard',['feteaured_product'=>$feteared_product,'trending_category'=>$trending_category]);

    }
    public function category() 
    {
        $category=Category::where('status',1)->get();
        return view('frontend/category',['category'=>$category]);

    }


    public function view_category($slug) 
    {
        if($category=Category::where('slug',$slug)->where('status',1)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $product=Product::where('cate_id',$category->id)->orderBy('id','DESC')->get();
            return view('frontend/view-category',['product'=>$product,'category'=>$category]);
        }
        else
        {
            return view('frontend/dashboard')->with("status","Slug doesn't exist");
        }
    }

    public function view_product($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $category=Category::where('slug',$cate_slug)->first()->id;
                $product=Product::where('slug',$prod_slug)->first();
                $related_products=Product::where('cate_id',$category)->where('id','!=',$product->id)->get();
                $rating=Rating::where('prod_id',$product->id)->get();
                $rating_sum=Rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating=Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews=Review::where('prod_id',$product->id)->get();
                if($rating->count()>0)
                {
                    $rating_value=$rating_sum/$rating->count();
                }
                else
                {
                    $rating_value=0;
                }
                
                return view('frontend/view-product',['product'=>$product,'rating'=>$rating,'rating_value'=>$rating_value,'user_rating'=>$user_rating,'reviews'=>$reviews,'related_products'=>$related_products]);
            }
            else
            {
                return view('frontend/view-product')->with('status','No such product found');
            }
        }
        else
        {
        return view('frontend/view-product')->with('status','No such Category found');
        } 
    }

    public function ajax_product_list()
    {
        $product=Product::select('name')->get();
        $data=[];
        foreach($product as $item)
        {
            $data[].=$item['name'];
        }

        return $data;
    }

    public function search_product(Request $request)
    {
        $product_name=$request->input('product_name');

        if($product_name!='')
        {
            $product=Product::where('name','LIKE','%'.$product_name.'%')->where('status',1)->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with('status',"No product matched your search");
            }

        }

        else
        {
            return redirect()->back();
        }


    }

    public function search_products(Request $request)
    {
        $product_name=$request->input('product_name');

        if($product_name!='')
        {
            $product=Product::where('name','LIKE','%'.$product_name.'%')->where('status',1)
                             ->orWhere('meta_title','LIKE','%'.$product_name.'%')
                             ->orWhere('meta_keywords','LIKE','%'.$product_name.'%')
                             ->orWhere('meta_descript','LIKE','%'.$product_name.'%')
                             ->orWhere('small_description','LIKE','%'.$product_name.'%')
                             ->orWhere('description','LIKE','%'.$product_name.'%')
                             ->get();
            if($product)
            {
                return view('frontend.search',['product'=>$product]);
            }
            else
            {
                return redirect()->back()->with('status',"No product matched your search");
            }

        }

        else
        {
            return redirect()->back();
        }


    }


    // public function test()
    // {
    //     $product=Product::where('status',0)->get();
    //     foreach($product as $item)
    //     {
    //     $item->status=1;
    //     $item->save();
    //     }
        
    // }
}
