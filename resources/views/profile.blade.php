@extends('layouts.frontend')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-4" style="text-align:center;">
             <img src="{{asset('assets/image/img_avatar3.png')}}" width="50%" alt="Avater">
        </div>
        <div class="col-md-8">
            <p><b>Name:</b>{{Auth::user()->name}}</p>
            <p><b>Email:</b>{{Auth::user()->email}}</p>
            <p><b>Phone:</b>{{Auth::user()->phone}}</p>
            <p><b>Address:</b>{{Auth::user()->address1}}</p>
            <p><b>Zip Code:</b>{{Auth::user()->pincode}}</p>
        </div>
    </div>
        

</div>
@endsection
