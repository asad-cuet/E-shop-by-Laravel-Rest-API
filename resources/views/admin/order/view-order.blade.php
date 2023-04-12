@extends('layouts.admin')

@section('title')
View Order
@endsection


@section('content')

<div class="container">
      
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header">
                           <h4>Order View
                                 @if($order->status==0)
                                 <a href="{{url('/orders')}}" class="btn btn-warning text-white float-right">Back</a>
                                 @elseif($order->status==1)
                                 <a href="{{url('/order-history')}}" class="btn btn-warning text-white float-right">Back</a>
                                 @endif
                           </h4>
                        </div>
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-6">
                                          <h4>Shopping Details</h4>
                                          <hr>
                                              <label for="">First Name</label>
                                              <div class="border p-2">{{$order->fname}}</div>
                                              <label for="">Last Name</label>
                                              <div class="border p-2">{{$order->lname}}</div>
                                              <label for="">Email</label>
                                              <div class="border p-2">{{$order->email}}</div>
                                              <label for="">Contact No.</label>
                                              <div class="border p-2">{{$order->phone}}</div>
                                              <label for="">Shipping Address</label>
                                              <div class="border p-2">{{$order->address1.','.$order->address2.','.$order->city.','.$order->state.','.$order->country}}</div>
                                              <label for="">Zip Code.</label>
                                              <div class="border">{{$order->pincode}}</div>
                                    </div>

                                    <div class="col-md-6">
                                          <h4>Order Details</h4>
                                          <hr>
                                          <div style="overflow-x:auto;">
                                          <table class="table table-bordered">
                                                <thead>
                                                      <tr>
                                                            <th>Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Image</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($order->orderItem as $item)
                                                          <tr>
                                                                <td>{{$item->product->name}}</td>
                                                                <td>{{$item->qty}}</td>
                                                                <td>{{$item->price}}</td>
                                                                <td>
                                                                      <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" width="50px" alt="Product Image">
                                                                </td>
                                                            </tr>          
                                                      @endforeach
                                                </tbody>
                                          </table>
                                          </div>
                                          <h4 class="px-2">Grand Total:<span class="float-right">$ {{$order->total_price}}</span></h4>
                                          <h6 class="px-2"><span class="float-right">{{$order->payment_mode}}</span></h6>
                                          <div class="mt-3 px-2">
                                                <label for="" class="">Order Status</label>
                                                <form action="{{url('/update-order/'.$order->id)}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                            <select class="form-select form-control border" name="order_status">
                                                            <option {{$order->status==0? 'selected':''}} value="0">Pending</option>
                                                            <option {{$order->status==1? 'selected':''}} value="1">Completed</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                                                            <a  href="{{url('/order/pdf/'.$item->id)}}" class="btn btn-danger mt-3 float-right">Make PDF</a>
                                                </form>
                                                
                                          </div>
                                          
                                    </div>
                              </div>

                        </div>
                  </div>

            </div>
      </div>
</div>

@endsection