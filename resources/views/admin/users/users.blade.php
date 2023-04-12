@extends('layouts.admin')                                     <!-- showing main component  -->
             
@section('content')
<div class="card">
      <div class="card-header bg-primary text-white">
                  <h4>Registered Users</h4>
      </div>
      <div class="card-body">
             <table class="table">
                   <thead>
                         <tr>
                               <th>Id</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Action</th>
                         </tr>
                  </thead>
                  <tbody>
                        @foreach ($users as $item)
                        <tr>
                              <td>{{$item->id}}</td>              
                              <td>{{$item->name}}</td> 
                              <td>{{$item->email}}</td>             
                              <td>{{$item->phone}}</td>             
                              <td>
                                    <a href="{{url('view-user/'.$item->id)}}" class="btn btn-primary">View</a>
                              </td>              
                        </tr>
                        @endforeach

                  </tbody>
            </table>                                
      </div>
</div>



@endsection