@extends('layouts.admin')                                     <!-- showing main component  -->
             
@section('content')
<div class="card">
      <div class="card-body">
             <div class="col-md-12">    
                  <a href="{{url('categories/insert_form')}}" class="btn btn-primary">Add Category</a>
             </div> 



             <table class="table">
                   <thead>
                         <tr>
                               <th>Id</th>
                               <th>Name</th>
                               <th>Image</th>
                               <th>Action</th>
                         </tr>
                  </thead>
                  <tbody>
                        @foreach ($category as $item)
                        <tr>
                              <td>{{$item->id}}</td>              
                              <td>{{$item->name}}</td>              
                              <td><img src="{{asset('assets/uploads/category/'.$item->image)}}" style="max-width:70px;"></td>              
                              <td>
                                    <a href="#" class="btn btn-secondary">View</a>
                                    <a href="{{url('categories/edit/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('categories/delete/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                              </td>              
                        </tr>
                        @endforeach

                  </tbody>
            </table>                                
      </div>
</div>



@endsection