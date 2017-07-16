<?php

namespace App\Http\Controllers\Admins;

use App\Models\Footer;
use App\Models\HomePage;
use App\Models\Sidebar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function homePageEdit()
    {
        $home = HomePage::all()->first();
        $sidebar = Sidebar::all()->first();
//        $dropdowns = Footer::all();
        return view('admin.page.home-page',compact('home','sidebar'));
    }
    public function homePageUpdate(Request $request)
    {
        $this->validate($request,[
            'slider_video' => 'required',
            'ceo_description' => 'required',
            'sidebar_video' => 'required'
        ]);
        HomePage::all()->first()->delete();
        HomePage::create(['video'=>$request->slider_video]);
        $sidebar = Sidebar::all()->first();
        $sidebar->delete();
        if($request->hasFile('ceo_image')){
//            if($sidebar->ceo_image&&$sidebar->ceo_image!='ceo-avatar.png')
//            {
//                $file_path = app_path().'\\images\\';
//                unlink($file_path.'/'.$sidebar->ceo_image);
//            }

            $file = $request->file('ceo_image');
            $filname = $file->getClientOriginalName();
            $destinationPath = app_path().'\\images\\';
            if($file->move($destinationPath, $filname)) {
                Sidebar::create(['ceo_image'=>$filname,'ceo_description'=>$request->ceo_description,'side_video'=>$request->sidebar_video]);
            }
        }
        else {
            $sidebar = Sidebar::create(['ceo_description'=>$request->ceo_description,'side_video'=>$request->sidebar_video]);
        }

        $dropdowns = $request->input('dropdown');
        if(isset($dropdowns))
        {
            foreach ($dropdowns as $d)
            {
                if(isset($d['dname']))
                {
                    $f = new Footer();
                    $f->dropdown_name = $d['drop_id'];
                    $f->parent_name = isset($d['parent_id'])?$d['parent_id']:0;
                    $f->name = $d['dname'];
                    $f->link = 'https://www.google.com';
                    $f->save();
                }
            }
        }
        return back();
    }
}
