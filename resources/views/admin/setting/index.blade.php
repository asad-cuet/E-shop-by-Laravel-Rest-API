@extends('layouts.admin')                                     <!-- showing main component  -->
             
@section('content')
<div class="card">
      <div class="card-body">

      <form method="POST" action="{{ url('setting/update/'.$setting->id)}}" enctype="multipart/form-data">
        @csrf 
            <div class="row">
                       
            <div class="col-md-12">
                  <label for="">Logo</label>
                  <img src="{{asset('assets/setting/'.$setting->logo)}}" style="max-width:70px;">
                  <input type="file" name="logo" class="form-control">
            </div>           
            <div class="col-md-12">
                  <label for="">Favicon</label>
                  <img src="{{asset('assets/setting/'.$setting->favicon)}}" style="max-width:70px;">
                  <input type="file" name="favicon" class="form-control">
            </div>           
            <div class="col-md-6 mb-3">
                  <label for="">Title</label>
                  <input required type="text" id="name" class="form-control" name="title" value="{{$setting->title}}">
            </div>            
            <div class="col-md-6 mb-3">
                  <label for="">Website Name</label>
                  <input required type="text" id="slug" class="form-control" name="name" value="{{$setting->name}}">
            </div>            




            <div class="col-md-12 mb-3">
                  <label for="">Footer Description</label>
                  <textarea required id="myMce" class="form-control" name="footer_descript">{{$setting->footer_descript}}</textarea>
            </div> 
            
            <div class="col-md-6 mb-3">
                  <label for="">Navigation Bar Color (sample : navbar-dark bg-dark)</label>
                  <input required type="text" name="nav_color" class="form-control" value="{{$setting->nav_color}}">
            </div>  
            <div class="col-md-6 mb-3">
                  <label for="">Body Color (Sample : bg-light text-dark)</label>
                  <input required type="text" name="body_color" class="form-control" value="{{$setting->body_color}}">
            </div>  

  

            <div class="col-md-12 mb-3">
                  <label for="">Meta Title</label>
                  <input required type="text" class="form-control" name="meta_title" value="{{$setting->meta_title}}">
            </div>  

            <div class="col-md-12 mb-3">
                  <label for="">Meta Keywords</label>
                  <input required type="text" class="form-control" name="meta_keywords" value="{{$setting->meta_keywords}}">
            </div>  

     
            <div class="col-md-12 mb-3">
                  <label for="">Meta Description</label>
                  <textarea required rows="3" class="form-control" name="meta_descript">{{$setting->meta_descript}}</textarea>
            </div>
            <div class="col-md-12">
                  <label for="">Banner Image 1</label>
                  <img src="{{asset('assets/setting/'.$setting->banner_image1)}}" style="max-width:70px;">
                  <input type="file" name="banner_image1" class="form-control">
            </div>
            <div class="col-md-12">
                  <label for="">Banner Image 2</label>
                  <img src="{{asset('assets/setting/'.$setting->banner_image2)}}" style="max-width:70px;">
                  <input type="file" name="banner_image2" class="form-control">
            </div>
            <div class="col-md-12">
                  <label for="">Banner Image 3</label>
                  <img src="{{asset('assets/setting/'.$setting->banner_image3)}}" style="max-width:70px;">
                  <input type="file" name="banner_image3" class="form-control">
            </div>

      <div class="col-md-12">    
           <button type="submit" class="btn btn-primary">Submit</button>
      </div> 

        </div>
      </form>
    </div>
</div>



@endsection