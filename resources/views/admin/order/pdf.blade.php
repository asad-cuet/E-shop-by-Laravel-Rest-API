<!doctype html>
<html>
<head>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <!-- Styles -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
      
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header" style="text-align: center;">
                           <h3>E-Shop</h3>
                           <p>Phone:xxxxxx</p>
                           <p>Email:asadul7733@gmail.com</p>
                        </div>
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-4">
                                          <h4>Customer Details</h4>
                                          <hr>
                                              <label for="">First Name:</label>
                                              <div class="border p-2">{{$order->fname}}</div>
                                              <label for="">Last Name:</label>
                                              <div class="border p-2">{{$order->lname}}</div>
                                              <label for="">Email:</label>
                                              <div class="border p-2">{{$order->email}}</div>
                                              <label for="">Contact No.:</label>
                                              <div class="border p-2">{{$order->phone}}</div>
                                              <label for="">Shipping Address:</label>
                                              <div class="border p-2">{{$order->address1.','.$order->address2.','.$order->city.','.$order->state.','.$order->country}}</div>
                                              <label for="">Zip Code.:</label>
                                              <div class="border">{{$order->pincode}}</div>
                                    </div>

                                    <div class="col-md-8">
                                          <h4>Order Details</h4>
                                          <hr>
                                          <div style="overflow-x:auto;">
                                          <table class="table table-bordered">
                                                <thead>
                                                      <tr>
                                                            <th>Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($order->orderItem as $item)
                                                          <tr>
                                                                <td>{{$item->product->name}}</td>
                                                                <td>{{$item->qty}}</td>
                                                                <td>{{$item->price}}</td>
                                                            </tr>          
                                                      @endforeach
                                                </tbody>
                                          </table>
                                          </div>
                                          <h3 class="px-2">Grand Total:<span class="float-right">$ {{$order->total_price}}</span></h3>
                                          <h4 class="px-2"><span class="float-right">@php if($order->payment_mode=='COD') { echo 'Cash On Delivery'; } else echo $order->payment_mode;  @endphp</span></h4>
                                          
                                    </div>
                              </div>

                        </div>
                  </div>

            </div>
      </div>
</div>


<script src="{{ asset('admin/js/jquery.min.js')}}"></script>
<script src="{{ asset('admin/js/popper.min.js')}}"></script>
<script src="{{ asset('admin/js/bootstrap-material-design.min.js')}}"></script>
<script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
</body>

</html>
