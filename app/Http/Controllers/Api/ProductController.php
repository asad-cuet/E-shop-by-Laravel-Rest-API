<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function index() 
    {
        $products=Product::orderBy('id','DESC')->get();
        return new ProductCollection($products);
    }
    public function viewProduct($product_id) 
    {
        $product=Product::where('id',$product_id)->first();

        $product_data=[
            'name'=>$product->name,
            'selling_price'=>$product->selling_price,
            'original_price'=>$product->original_price,
            'image'=> asset('assets/uploads/product/'.$product->image),
        ];
        $response=[
            'success'=>true,
            'data'=>$product_data
        ];

        return response()->json($response,200);
    }
}
