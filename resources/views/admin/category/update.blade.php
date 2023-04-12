@extends('layouts.admin')                                     <!-- showing main component  -->
             
@section('content')
<div class="card">
      <div class="card-body">

      <h3>Update Category</h3>     

      <form method="POST" action="{{ url('categories/update/'.$val->id)}}" enctype="multipart/form-data">
        @csrf 
            <div class="row">
      
            <div class="col-md-6 mb-3">
                  <label for="">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$val->name}}">
            </div>      
            <div class="col-md-6 mb-3">
                  <label for="">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{$val->slug}}">
            </div>  
            
            <script>   
                  $('#name').keyup(function()   //click
                  {
                  var name=$('#name').val();
                  name=name.replace(/\s+/g, '-');
                  $('#slug').val(name);
                  });
            </script>

            <div class="col-md-12 mb-3">
                  <label for="">Description</label>
                  <textarea rows="3" class="form-control" name="description">{{$val->description}}</textarea>
            </div> 
            
            <div class="col-md-6 mb-3">
                  <label for="">Active</label>  
                  <input type="checkbox" name="status" @php if($val->status==1) echo"checked"  @endphp>
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Popular</label>
                  <input type="checkbox" name="popular" @php if($val->popular==1) echo"checked"  @endphp>
            </div>  

            <div class="col-md-12 mb-3">
                  <label for="">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" value="{{$val->meta_title}}">
            </div>  

            <div class="col-md-12 mb-3">
                  <label for="">Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keywords" value="{{$val->meta_keywords}}">
            </div>  

     
            <div class="col-md-12 mb-3">
                  <label for="">Meta Description</label>
                  <textarea rows="3" class="form-control" name="meta_descript">{{$val->meta_descript}}</textarea>
            </div>
            <div class="col-md-12">
                  <input type="file" name="image" class="form-control">
                  <img src="{{asset('assets/uploads/category/'.$val->image)}}" style="max-width:70px;">
            </div>
            

      <div class="col-md-12">    
           <button type="submit" class="btn btn-primary">Submit</button>
      </div> 

        </div>
      </form>

    </div>
</div>



@endsection