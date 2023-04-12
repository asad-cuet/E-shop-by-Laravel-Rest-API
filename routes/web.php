<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SslCommerzPaymentController;

use Illuminate\Support\Facades\URL;
use App\Models\Product;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//All Frontend Route


Route::get('/','Frontend\FrontendController@index');
Route::get('category','Frontend\FrontendController@category');
Route::get('category/{slug}','Frontend\FrontendController@view_category');
Route::get('category/{cate_slug}/{prod_slug}','Frontend\FrontendController@view_product');
Route::post('/add-to-cart','Frontend\CartController@addProduct');
Route::get('/load-cart-data','Frontend\CartController@load_cart_data');
Route::get('/product-list','Frontend\FrontendController@ajax_product_list');
Route::post('/search-product','Frontend\FrontendController@search_products');
Route::get('/test','Frontend\FrontendController@test');






                                
Route::middleware('auth')->group(function() {   // use for verify email:  ['auth','verified']
    Route::get('/cart','Frontend\CartController@viewCart')->name('cart');
    Route::post('/delete-cart-item','Frontend\CartController@deleteCartItem');
    Route::post('/update-cart','Frontend\CartController@updateCart');
    Route::get('/checkout','Frontend\CheckoutController@index');
    Route::any('/place-order','Frontend\CheckoutController@placeOrder');
    Route::get('/my-orders','Frontend\UserController@index');
    Route::get('/view-order/{order_id}','Frontend\UserController@view_order');
    Route::get('/wishlist','Frontend\WishlistController@index');
    Route::post('/add-to-wishlist','Frontend\WishlistController@add_to_wishlist');
    Route::post('/delete-wishlist-item','Frontend\WishlistController@delete_wishlist_item');
    Route::post('/proceed-to-pay','Frontend\CheckoutController@razorpay_Check');
    Route::post('/add-rating','Frontend\RatingController@add_rating');
    Route::get('/add-review/{slug}/user-review','Frontend\ReviewController@index');
    Route::post('/add-review','Frontend\ReviewController@add_review');
    Route::get('/edit-review/{slug}/user-review','Frontend\ReviewController@edit_review');
    Route::post('/update-review','Frontend\ReviewController@update');
    Route::any('/ssl-payment','Frontend\SslController@payment');

    // SSLCOMMERZ Start
    Route::any('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END


});

Auth::routes(['verify'=>true]);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// All Admin Panel Route

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard','Admin\DashboardController@index');

    //Category    
    Route::prefix('categories')->name('category')->group(function(){
        Route::get('','Admin\CategoryController@index')->name('');
         Route::get('insert_form','Admin\CategoryController@insert_form')->name('.read'); 
         Route::post('insert','Admin\CategoryController@insert')->name('.insert'); 
         Route::get('edit/{id}','Admin\CategoryController@edit')->name('.edit'); 
         Route::post('update/{id}','Admin\CategoryController@update')->name('.update'); 
         Route::get('delete/{id}','Admin\CategoryController@delete')->name('.delete'); 
                                      });

    //Product  
    Route::prefix('products')->name('product')->group(function(){

        Route::get('','Admin\ProductController@index')->name('');
         Route::get('insert_form','Admin\ProductController@insert_form')->name('.read'); 
         Route::post('insert','Admin\ProductController@insert')->name('.insert'); 
         Route::get('edit/{id}','Admin\ProductController@edit')->name('.edit'); 
         Route::post('update/{id}','Admin\ProductController@update')->name('.update'); 
         Route::get('delete/{id}','Admin\ProductController@delete')->name('.delete'); 
                                      });

        //Order
        Route::get('/orders','Admin\OrderController@index');  
        Route::get('/admin/view-order/{order_id}','Admin\OrderController@view_order');                               
        Route::put('/update-order/{order_id}','Admin\OrderController@update_order');                               
        Route::get('/order-history','Admin\OrderController@order_history');   

        //User 
        Route::get('/users','Admin\UserController@index');
        Route::get('/view-user/{user_id}','Admin\UserController@view_user');  

        //Setting                         
        Route::get('/setting','Setting\SettingController@index');                           
        Route::post('/setting/update/{id}','Setting\SettingController@update');
        
        //Order PDF
        Route::get('/order/pdf/{order_id}','Admin\PdfController@order');

       //ajax product search
        Route::any('/admin/search/product','Admin\ProductController@search_result');

  });






Route::get('sitemap',function(){
    $site=App::make('sitemap');

    $site->add(URL::to('/'),date("Y-m-d h:i:s"),1,'daily');

    $product=Product::all();
    $category=Category::all();

    foreach($product as $key=>$pt)
    {
        $site->add(URL::to($pt->slug),$pt->created_at,1,'daily');
    }

    foreach($category as $key=>$pt)
    {
        $site->add(URL::to($pt->slug),$pt->created_at,1,'daily');
    }

    $site->store('xml','sitemap');
});