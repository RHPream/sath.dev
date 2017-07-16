<?php

namespace App\Http\Controllers\Users;

use App\Models\Footer;
use App\Models\Lecture;
use App\Models\Routine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index($id)
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        $lectures = Lecture::where('subject_id',$id)->get();
        return view('lecture.subject',compact('dropdowns','lectures'));
    }
    public function routine()
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        $routines = Routine::where('subject_id',3)->get();
        return view('lecture.routine',compact('dropdowns','routines'));
    }
    public function question()
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        return view('exam.varsityQuestion',compact('dropdowns'));
    }
}
