@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title')
Wishlist
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
      <div class="container">
            <h6 class="mb-0">Wishlist</h6>      
      </div>       
</div>  



<div class="container my-5">
      <div class="card shadow wishlistitems">
            @if($wishlist->count()>0)
            <div class="card-body">
                 
                  @foreach ($wishlist as $item)
                  <div class="row product_data">
     
                        <div class="col-md-2 my-auto">
                              <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" height="70px" width="70px" alt="Image">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{$item->product->name}}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>Rs {{$item->product->selling_price}}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                              <input type="hidden" value="{{$item->product->id}}" class="prod_id">
                              <input type="hidden" value="{{$item->id}}" class="wish_id">
                        @if($item->product->qty>0)
                              <label class="badge bg-success">In stock</label>
                              @else       
                              <label class="badge bg-danger">Out of stock</label> 
                        @endif
                        </div>
                        <div class="col-md-2 my-auto">
                              <input type="hidden" name="quantity" value="1" class="form-control qty-input text-center" />
                              <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                        </div>
                        <div class="col-md-2 my-auto">
                              <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash"></i>Remove</button>
                        </div>
                         
                  </div>
                 
                  
                  @endforeach
            </div>

            @else
            <div class="card-body text-center">
                  <h2>Your <i class="fa fa-shopping-cart"> Wishlist is empty</i></h2>
                  <a href="{{url('/category')}}" class="btn btn-outline-primary float-end">Continue Shoppinh</a>
            </div>
            @endif
      </div>
</div>

@endsection

@section('scripts')
<script>


</script>
@endsection