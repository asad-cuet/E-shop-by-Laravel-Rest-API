@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title')
{{App\Models\Setting::first()->title}}
@endsection

@section('meta')
<meta name="title" content="{{App\Models\Setting::first()->meta_title}}">
<meta name="description" content="{{App\Models\Setting::first()->meta_descript}}">
<meta name="keywords" content="{{App\Models\Setting::first()->meta_keywords}}">    
@endsection

@section('content')
@include('layouts.front_inc.slider')
      

<div class="py-5">
      <div class="container">
            <div class="row">
                  <h4>Featured Products</h4>
                  <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($feteaured_product as $item)
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


<div class="py-5">
      <div class="container">
            <div class="row">
                  <h4>Trending Category</h4>
                  <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($trending_category as $item)
                             <a href="{{url('category/'.$item->slug)}}" >
                              <div class="item">
                                    <div class="card">
                                          <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Product Image">
                                          <div class="card-body">
                                                <h5>{{$item->name}}</h5>
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

@if(Auth::user())
      @if(Auth::user()->email_verified_at==NULL)
      <script>
      swal("Verify Your Email Address.Check Your Mail");
      </script>    
      @endif   
@endif   


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
      $('.category-carousel').owlCarousel({
            loop:true,
            margin:0,
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