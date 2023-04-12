@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title')
All Categories
@endsection


@section('content')

     

<div class="py-5">
      <div class="container">
            <div class="row">
                  <h2>All Categories</h2>
                  
                        @foreach ($category as $item)
                             
                              <div class="col-md-3 mb-3">
                                    <a href="{{url('category/'.$item->slug)}}" >
                                    <div class="card">
                                          <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Product Image">
                                          <div class="card-body">
                                                <h5>{{$item->name}}</h5>
                                          </div>
                                    </div>
                                    </a>
                              </div>
                        @endforeach
                  
            </div>
      </div>
</div>

@endsection

@section('scripts')

@endsection