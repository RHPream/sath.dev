<?php

namespace App\Http\Controllers\Users;

use App\Models\Footer;
use App\Models\Lecture;
use App\Models\Routine;
use App\Models\UserRoutine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        $lectures = Lecture::where('subject_id',$id)->get();
        return view('lecture.subject',compact('dropdowns','lectures'));
    }
    public function routine()
    {
        $clas = Auth::user()->userProfile->class_id;
        if($clas) {
            $routines = UserRoutine::where('class_id',$clas)->get();
            return view('users.routine.index',compact('routines'));
        }
        Session::flash('success','Please give us your class for exact advice.');
        return back();
    }
    public function question()
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        return view('exam.varsityQuestion',compact('dropdowns'));
    }
}
