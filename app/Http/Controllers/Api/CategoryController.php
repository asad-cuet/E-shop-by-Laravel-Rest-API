<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\ProductCollection;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories=Category::orderBy('id','DESC')->get();
        return new CategoryCollection($categories);
    }
    public function categoryView($id) 
    {
        $products=Product::where('cate_id',$id)->orderBy('id','DESC')->get();
        return new ProductCollection($products);
    }
}
