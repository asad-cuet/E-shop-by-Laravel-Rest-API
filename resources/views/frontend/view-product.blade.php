@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title'){{$product->name}}@endsection

@section('meta')
<meta name="title" content="{{$product->meta_title}}">
<meta name="description" content="{{$product->meta_descript}}">
<meta name="keywords" content="{{$product->meta_keywords}}">    
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/add-rating')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"> 


                                     <div class="rating-css">
                                          <div class="star-icon">
                                                @if(!empty($user_rating))
                                                      @for($i=1;$i<=$user_rating->stars_rated;$i++)
                                                            <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                                            <label for="rating{{$i}}" class="fa fa-star"></label>
                                                      @endfor
                                                      @for($j=$user_rating->stars_rated+1;$j<=5;$j++)
                                                      <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                                      <label for="rating{{$j}}" class="fa fa-star"></label>
                                                      @endfor
                                                @else
                                                      <input type="radio" value="1" name="product_rating" id="rating1">
                                                      <label for="rating1" class="fa fa-star"></label>
                                                      <input type="radio" value="2" name="product_rating" id="rating2">
                                                      <label for="rating2" class="fa fa-star"></label>
                                                      <input type="radio" value="3" name="product_rating" id="rating3">
                                                      <label for="rating3" class="fa fa-star"></label>
                                                      <input type="radio" value="4" name="product_rating" id="rating4">
                                                      <label for="rating4" class="fa fa-star"></label>
                                                      <input type="radio" value="5" name="product_rating" id="rating5" selected>
                                                      <label for="rating5" class="fa fa-star"></label>
                                                @endif


                                          </div>
                                    </div>
                                    
                                    

                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
          </form>
        </div>
      </div>
</div>






 <div class="py-3 mb-4 shadow-sm bg-warning border-top">
      <div class="container">
            <h6 class="mb-0">Collections / {{$product->category->name.' / '.$product->name}}</h6>      
      </div>       
</div>      


<div class="container">
      <div class="card shadow product_data">
            <div class="card-body">
                  <div class="row">
                        <div class="col-md-4 border-roght">
                              <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="image" class="w-100">
                        </div>
                        <div class="col-md-8">
                              <h2 class="mb-0">
                                    {{$product->name}}
                                    <label style="font-size:16px;" class="float-end badge bg-danger trending_tag">{{$product->trending==1 ? 'Trending':''}}</label>
                              </h2>
                              <hr>
                              <label class="me-3">Original Price: <s>$ {{$product->original_price}}</s></label>
                              <label class="fw-bold">Selling Price: $ {{$product->selling_price}}</label>
                              @php $ratenum=number_format($rating_value) @endphp
                              <div class="rating">
                                    @for($i=1;$i<=$ratenum;$i++)
                                         <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for($j=$ratenum+1;$j<=5;$j++)
                                         <i class="fa fa-star"></i>
                                    @endfor
                                    
                                    <span>
                                        @if($rating->count()>0)  
                                          {{$rating->count()}}  Ratings
                                        @else
                                          No Ratings
                                        @endif  
                                    </span>

                              </div>

                              <div class="mt-3">
                                    @php echo html_entity_decode( $product->small_description) @endphp
                              </div>
                              <hr>
                              @if($product->qty>0)
                                    <label class="badge bg-success">In stock</label>
                              @else       
                                    <label class="badge bg-danger">Out of stock</label> 
                              @endif
                              <div class="row mt-2">
                                     <div class="col-md-3">
                                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                                <label for="quantity">Quantity</label>
                                                <div class="input-group text-center mb-3" style="width:130px;">
                                                       <button class="input-group-text decrement-btn">-</button>
                                                       <input type="text" name="quantity" value="1" class="form-control qty-input text-center" />
                                                       <button class="input-group-text increment-btn">+</button>      
                                                </div>       
                                    </div> 
                                    <div class="col-md-9">
                                          <br/>
                                          @if($product->qty>0)
                                          <button type="button" class="btn btn-primary me-3 float-start  addToCartBtn">Add to Cart <i class="fa fa-shopping-cart"></i></button>                                          
                                          <button type="button" class="btn btn-success addToWishlist me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                                          @else       
                                          <button type="button" class="btn btn-success addToWishlist me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                                          @endif
                                           
                                                    
                                    </div> 
                                    <div class="mt-2 text-secondary">
                                          @php
                                                $ip=Request::ip();
                                                if(!App\Models\View::where('ip',$ip)->where('prod_id',$product->id)->exists())
                                                {
                                                      $view=new App\Models\View;
                                                      $view->prod_id=$product->id;
                                                      $view->ip=$ip;
                                                      $view->save();
                                                }
                                                $views=App\Models\View::where('prod_id',$product->id)->count();        
                                          @endphp
                                          Views: {{$views}}
                                    </div>     
                              </div> 
    
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-md-12">
                              <hr>
                              <h5>Description</h5>
                              <p class="mt-3">
                                    @php echo html_entity_decode( $product->description) @endphp
                              </p>                              
                       </div> 
                  </div>

                  <hr>

                  <div class="row">
                        <div class="col-md-4">
                        <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Rate this Product
                              </button>
                              <a href="{{url('/add-review/'.$product->slug.'/user-review')}}" class="btn btn-secondary mt-3">
                              Write a Review
                              </a>
                        </div>
                        <div class="col-md-8">
                              @foreach ($reviews as $item)


                               <div class="user-review">
                                    <label for="">{{$item->user->name}}</label>
                                    @if($item->user_id==Auth::id())
                                    <a href="{{url('edit-review/'.$product->slug.'/user-review')}}">Edit</a>
                                    @endif

                                    <br>
                                    @if($user_rating)
                                          @php $user_rated=$user_rating->stars_rated  @endphp
                                          @for($i=1;$i<=$user_rated;$i++)
                                                <i class="fa fa-star checked"></i>
                                          @endfor
                                          @for($j=$user_rated+1;$j<=5;$j++)
                                                <i class="fa fa-star"></i>
                                          @endfor
                                    @endif                                          
                                    <small>Reviewd on {{$item->created_at->format('d M Y')}}</small>
                                    <p>
                                          {{$item->user_review}}
                                          <script>console.log('{{$item->ratings}}')</script>
                                    </p>                                   
                              </div>   


                              @endforeach
                        </div>
                  </div>
            </div>
      </div>
</div>


{{-- Related Products --}}


<div class="py-5">
      <div class="container">
            <div class="row">
                  <h4>Related Products</h4>
                  <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($related_products as $item)
                        <a href="{{url('category/'.$item->category->slug.'/'.$item->slug)}}">
                              <div class="item">
                                    <div class="card">
                                          <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="Product Image">
                                          <div class="card-body">
                                                <h5>{{$item->name}}</h5>
                                                <span class="float-start">{{$item->selling_price}}</span>
                                                <span class="float-end"><s>{{$item->original_price}}</s></span>
                                          </div>
                                    </div>
                              </div>
                        </a>      
                        @endforeach
                  </div>
            </div>
      </div>
</div>
    

@endsection






@section('scripts')

<script>
            $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:1500,
            autoplayHoverPause:true,
            dots:false,
            responsiveClass:true,
            responsive:{
            0:{
                  items:2,
                  nav:true
            },
            600:{
                  items:4,
                  nav:false
            },
            1000:{
                  items:7,
                  nav:true,
                  loop:true
            }
            }
      })
</script>

@endsection