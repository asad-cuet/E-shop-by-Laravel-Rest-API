<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use File;

class SettingController extends Controller
{
    public function index()
    {
        $setting=Setting::where('id',1)->first();
        return view('admin.setting.index',['setting'=>$setting]);
    }

    public function update(Request $request,$id)
    {
        $setting=Setting::find($id);


        if($request->hasfile('logo'))
        {
            $old_image='assets/setting/'.$setting->logo;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('logo');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/setting',$filename);
            $setting->logo=$filename;
        }
        if($request->hasfile('favicon'))
        {
            $old_image='assets/setting/'.$setting->favicon;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('favicon');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/setting',$filename);
            $setting->favicon=$filename;
        }
        if($request->hasfile('banner_image1'))
        {
            $old_image='assets/setting/'.$setting->banner_image1;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('banner_image1');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/setting',$filename);
            $setting->banner_image1=$filename;
        }

        if($request->hasfile('banner_image2'))
        {
            $old_image='assets/setting/'.$setting->banner_image2;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('banner_image2');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/setting',$filename);
            $setting->banner_image2=$filename;
        }

        if($request->hasfile('banner_image3'))
        {
            $old_image='assets/setting/'.$setting->banner_image3;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('banner_image3');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/setting',$filename);
            $setting->banner_image3=$filename;
        }



        
        $setting->title=$request->input('title');
        $setting->name=$request->input('name');
        $setting->footer_descript=$request->input('footer_descript');
        $setting->nav_color=$request->input('nav_color');
        $setting->body_color=$request->input('body_color');
        $setting->meta_title=$request->input('meta_title');
        $setting->meta_keywords=$request->input('meta_keywords');
        $setting->meta_descript=$request->input('meta_descript');

  
        $setting->save();
        return redirect('/setting')->with('status','Setting Updated Successfully');        
    }
}
