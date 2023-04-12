@extends('layouts.admin')                                     <!-- showing main component  -->
             
@section('content')
<div class="card">
      <div class="card-body">

      <form method="POST" action="{{ url('products/update/'.$val->id)}}" enctype="multipart/form-data">
        @csrf 
            <div class="row">
            <div class="col-md-12 mb-3">
                  <select class="form-select form-control border" name="cate_id">
                        <option>Select a category</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}" @php if($item->id==$val->category->id) echo'selected'; @endphp>{{$item->name}}</option>
                        @endforeach
                  </select>
            </div>      
                      
            <div class="col-md-6 mb-3">
                  <label for="">Name</label>
                  <input type="text" id="name" class="form-control" name="name" value="{{$val->name}}">
            </div>            
            <div class="col-md-6 mb-3">
                  <label for="">Slug</label>
                  <input type="text" id="slug" class="form-control" name="slug" value="{{$val->slug}}">
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
                  <label for="">Small Description</label>
                  <textarea id="myMce" class="form-control" name="small_description">{{$val->small_description}}</textarea>
            </div> 
            <div class="col-md-12 mb-3">
                  <label for="">Description</label>
                  <textarea id="myMce" class="form-control" name="description">{{$val->description}}</textarea>
            </div> 
            
            <div class="col-md-6 mb-3">
                  <label for="">Original Price</label>
                  <input type="number" name="original_price" class="form-control" value="{{$val->original_price}}">
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Selling Price</label>
                  <input type="number" name="selling_price" class="form-control" value="{{$val->selling_price}}">
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Quantity</label>
                  <input type="number" name="qty" class="form-control" value="{{$val->qty}}">
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Tax</label>
                  <input type="number" name="tax" class="form-control" value="{{$val->tax}}">
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Active [Allow to show on web page]</label>  
                  <input type="checkbox" name="status" @php if($val->status==1) echo"checked"  @endphp>
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Trending</label>
                  <input type="checkbox" name="trending" @php if($val->trending==1) echo"checked"  @endphp>
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
                  <img src="{{asset('assets/uploads/product/'.$val->image)}}" style="max-width:70px;">
            </div>

      <div class="col-md-12">    
           <button type="submit" class="btn btn-primary">Submit</button>
      </div> 

        </div>
      </form>
    </div>
</div>



@endsection