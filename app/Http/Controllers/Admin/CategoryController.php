<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $category=Category::orderBy('id','DESC')->get();
        return view('admin.category.index',['category'=>$category]);
              }



        public function insert_form()
        {
          return view('admin.category.add');
        }          
        
        public function insert(Request $request)
        {
            $category=new Category;


            if($request->hasfile('image'))       
            {
                $file=$request->file('image');
                $extention=$file->getClientOriginalExtension();  
                $filename=uniqid().'.'.$extention;
                $file->move('assets/uploads/category',$filename);  //move($destin,$name);  public/
                $category->image=$filename;
            }


            $category->name=$request->input('name');
            $category->slug=$request->input('slug');
            $category->description=$request->input('description');
            $category->status=$request->input('status')==True ? '1' : '0';
            $category->popular=$request->input('popular')==True ? '1' : '0';
            $category->meta_title=$request->input('meta_title');
            $category->meta_keywords=$request->input('meta_keywords');
            $category->meta_descript=$request->input('meta_descript');
    
      
    

            $category->save();
            return redirect(route('category'))->with('status','category Added!!');
          
        }          




        public function edit($id)
        {
            $category=Category::find($id);
            return view('admin.category.update',['val'=>$category]);
    
        }


        
    public function update(Request $request, $id)
    {
        $category=Category::find($id);


        if($request->hasfile('image'))
        {
            $old_image='assets/uploads/category/'.$category->image;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }



        
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==True ? '1' : '0';
        $category->popular=$request->input('popular')==True ? '1' : '0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_descript=$request->input('meta_descript');

        $category->save();
        return redirect(route('category'))->with('status','category Updated!!');
    }



    public function delete($id)
    {
        $category=Category::find($id);
        $old_image='assets/uploads/category/'.$category->image;
        if(File::exists($old_image))
        {
            File::delete($old_image);
        }
        $category->delete();
        return redirect(route('category'))->with('status','category Deleted!!');
    }
}
