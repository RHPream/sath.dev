<?php

namespace App\Http\Controllers;

use App\Models\ExamRanking;
use App\Models\Footer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        $subjects = Subject::all();
        $exams = ExamRanking::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('users.dashboard',compact('dropdowns','subjects','exams'));
    }
    public function userUpdate(Request $request)
    {
        dd($request->input());
    }
}
