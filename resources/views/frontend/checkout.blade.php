@extends('layouts.frontend')                                     <!-- showing main component  -->
   
@section('title')
Checkout Page
@endsection


@section('content')

<div class="container mt-5">
   <form action="{{url('/place-order')}}" method="POST">
      @csrf  
      <div class="row">
            <div class="col-md-5">
                  <div class="card">
                        <div class="card-body">
                              <h6>Basic Details</h6>
                              <hr>
                              <div class="row checkout-form">
                                    <div class="col-md-6">
                                          <label for="">First Name</label>
                                          <input required type="text" name="fname" value="{{Auth::user()->fname}}" class="form-control fname" placeholder="Enter First Name">
                                          <span id="fname_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6">
                                          <label for="">Last Name</label>
                                          <input required type="text" name="lname" value="{{Auth::user()->lname}}" class="form-control lname" placeholder="Enter Last Name">
                                          <span id="lname_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">Email</label>
                                          <input required type="email" name="email" value="{{Auth::user()->email}}" class="form-control email" placeholder="Enter Email">
                                          <span id="email_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">Phone number</label>
                                          <input required type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control phone" placeholder="Enter Phone Number">
                                          <span id="phone_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">Address 1</label>
                                          <input required type="text" name="address1" value="{{Auth::user()->address1}}" class="form-control address1" placeholder="Enter Address 1">
                                          <span id="address1_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">Address 2</label>
                                          <input type="text" name="address2" value="{{Auth::user()->address2}}" class="form-control address2" placeholder="Enter Address 2">
                                          
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">City</label>
                                          <input required type="text" name="city" value="{{Auth::user()->city}}" class="form-control city" placeholder="Enter City">
                                          <span id="city_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">State</label>
                                          <input required type="text" name="state" value="{{Auth::user()->state}}" class="form-control state" placeholder="Enter State">
                                          <span id="state_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">Country</label>
                                          <input required type="text" name="country" value="{{Auth::user()->country}}" class="form-control country" placeholder="Enter Country">
                                          <span id="country_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                          <label for="">Post Code</label>
                                          <input required type="password" name="pincode" value="{{Auth::user()->pincode}}" class="form-control pincode" placeholder="Enter Pin Code">
                                          <span id="pincode_error" class="text-danger"></span>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-7">
                  <div class="card">
                        <div class="card-body">
                              @if($cartitems->count()>0)
                              Order Details
                              <hr>
                              <table class="table table-striped table-bordered">
                                    <thead>
                                          <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @php $total=0; @endphp
                                          @foreach ($cartitems as $item)
                                              <tr>
                                                    <td>
                                                            <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" width="50px" alt="Product Image">
                                                    </td>
                                                    <td>{{$item->product->name}}</td>
                                                    <td>{{$item->prod_qty}}</td>
                                                    <td>{{$item->product->selling_price}}</td>
                                              </tr>
                                          @php $total+=($item->product->selling_price)*($item->prod_qty); @endphp    
                                          @endforeach
                                    </tbody>
                              </table>
                              <h4>Total : <span class="float-end">$ {{$total}}</span></h4>
                              <hr>
                              <input type="hidden" class="total" value="{{$total}}">
                              <input type="hidden" name="payment_mode" value="COD">
                              <button type="submit" class="btn btn-success w-100">Place Order | Cash On Delivery</button>
                              <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button>
                              {{-- <button class="your-button-class mt-3 w-100" id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata="your javascript arrays or objects which requires in backend"
                                    order="If you already have the transaction generated for current order"
                                    endpoint="/pay-via-ajax"> SSL
                              </button> --}}
                              <!-- paypal button -->
                              <div class="mt-3">
                                    <div id="paypal-button-container"></div>
                              </div>
                              

                              @else
                                  <h4 class="text-center">No products in Cart</h4>

                              @endif
                        </div>
                  </div>
            </div>
      </div> 
   </form>   
</div>
@endsection

@section('scripts')
<!-- paypal script -->
<script src="https://www.paypal.com/sdk/js?client-id=AQHZPWmsg8QTiAx6bgfd6QXE-PSxVJKJy4Y70K91GMbKlTm2IgLpffo0gYtUnuSLy7iDLWzF_GBRZC_6&currency=USD"></script>
<script src="js/paypal.js"></script>
<!-- razorpay script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>






<!-- SSL -->

{{-- 
<script src="js/ssl.js"></script>         --}}



 @endsection