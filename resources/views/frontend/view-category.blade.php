@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title'){{$category->name}}@endsection


@section('meta')
<meta name="title" content="{{$category->meta_title}}">
<meta name="description" content="{{$category->meta_descript}}">
<meta name="keywords" content="{{$category->meta_keywords}}">    
@endsection



@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
      <div class="container">
            <h6 class="mb-0">Collections / {{$category->name}}</h6>      
      </div>       
</div>   

<div class="py-5">
      <div class="container">
            <div class="row">
                  <h2>{{$category->name}}</h2>
                 
                        @foreach ($product as $item)
                              <div class="col-md-3 mb-3">
                                    <div class="card">
                                    <a href="{{url('category/'.$item->category->slug.'/'.$item->slug)}}">
                                    
                                          <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="Product Image" class="w-100">
                                          <div class="card-body">
                                                <h5>{{$item->name}}</h5>
                                                <span class="float-start">{{$item->selling_price}}</span>
                                                <span class="float-end"><s>{{$item->original_price}}</s></span>
                                          </div>
                                    
                                    </a>   
                                    </div>   

                              </div>
                        @endforeach
                  
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