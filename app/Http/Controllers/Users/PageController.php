<?php

namespace App\Http\Controllers\Users;

use App\Mail\ContactUsMail;
use App\Models\Cirular;
use App\Models\Footer;
use App\Models\HomePage;
use App\Models\Lecture;
use App\Models\Message;
use App\Models\Sidebar;
use App\Models\Subject;
use App\Models\UserClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function welcome()
    {
        $video = HomePage::all()->first()->video;
        $info = Sidebar::all()->first();
        $sciences = Cirular::where('type','Science')->get();
        $arts = Cirular::where('type','Arts')->get();
        $commerces = Cirular::where('type','Commerce')->get();
        $commons = Cirular::where('type','Common')->get();
        $messages = Message::all();
        return view('welcome',compact('video','sciences','arts','commerces','commons','info','messages'));
    }
    public function contactUs(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        Mail::to('contact@easyschool.com')->send(new ContactUsMail($name,$email,$message));
        return back()->with('status','Your mail was send to us. We will nitify you soon.');
    }
    public function preparation()
    {
        $class_id = Auth::user()->userProfile->class_id;
        $subjects = Subject::where('class',$class_id)->get();
        return view('users.preparation.classes',compact('subjects'));
    }
    public function preparationClass($id)
    {
        $class_id = Auth::user()->userProfile->class_id;
        $chapters = Lecture::where('class_id',$class_id)->where('subject_id',$id)->get();
        $cps = [];
        $flag = true;
        foreach ($chapters as $c)
        {
            $tut = '<a href="'.$c->tut_link.'" target="_blank">Watch Video</a>';
            foreach ($chapters as $d)
            {
                if($c->id!=$d->id && $c->chapter_id==$d->chapter_id) {
                    $tut = $tut.'<br>'.'<a href="'.$d->tut_link.'" target="_blank">Watch Video</a>';
                    $cps[$c->chapter_id] = [
                        'chapter' => $c->chapter->name,
                        'content' => $c->name.'<br>'.$d->name,
                        'tut' => $tut,
                        'exam' => ''
                    ];
                    $flag = false;
                }
            }
            if($flag){
                $cps[$c->chapter_id] = [
                    'chapter' => $c->chapter->name,
                    'content' => $c->name,
                    'tut' => $tut,
                    'exam' => $c->slug
                ];
            }
            $flag = true;
        }
        return view('users.preparation.preparation',compact('chapters','cps'));
    }
}
