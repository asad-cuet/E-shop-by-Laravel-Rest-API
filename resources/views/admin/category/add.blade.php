@extends('layouts.admin')                                     <!-- showing main component  -->
             
@section('content')
<div class="card">
      <div class="card-body">

      <form method="POST" action="{{ url('categories/insert')}}" enctype="multipart/form-data">
        @csrf 
            <div class="row">
      
            <div class="col-md-6 mb-3">
                  <label for="">Name</label>
                  <input type="text" id="name" class="form-control" name="name">
            </div>      
            <div class="col-md-6 mb-3">
                  <label for="">Slug</label>
                  <input type="text" id="slug" class="form-control" name="slug">
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
                  <textarea rows="3" class="form-control" name="description"></textarea>
            </div> 
            
            <div class="col-md-6 mb-3">
                  <label for="">Active</label>   
                  <input checked type="checkbox" name="status">
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Popular</label>
                  <input type="checkbox" name="popular">
            </div>  

            <div class="col-md-12 mb-3">
                  <label for="">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title">
            </div>  

            <div class="col-md-12 mb-3">
                  <label for="">Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keywords">
            </div>  

     
            <div class="col-md-12 mb-3">
                  <label for="">Meta Description</label>
                  <textarea rows="3" class="form-control" name="meta_descript"></textarea>
            </div>
            <div class="col-md-12">
                  <input type="file" name="image" class="form-control">
            </div>

      <div class="col-md-12">    
           <button type="submit" class="btn btn-primary">Submit</button>
      </div> 

        </div>
      </form>
    </div>
</div>



@endsection