@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title')
Search List
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
      <div class="container">
            <h6 class="mb-0">Search Result</h6>      
      </div>       
</div>   

<div class="py-5">
      <div class="container">
            <div class="row">
                  
                 
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

@endsection