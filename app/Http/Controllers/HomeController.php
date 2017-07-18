<?php

namespace App\Http\Controllers;

use App\Models\ExamRanking;
use App\Models\Footer;
use App\Models\Subject;
use App\Models\UserClass;
use App\Models\UserProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $classes = UserClass::all();
        $exams = ExamRanking::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('users.dashboard',compact('dropdowns','subjects','exams','classes'));
    }
    public function userUpdate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'phone' => 'required|min:11',
            'class_id' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'class_id' => $request->class_id
        ];
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->name;
        $user->save();
        $userProfile = UserProfile::where('user_id',$user->id)->first();
        $userProfile->phone = $request->phone;
        $userProfile->class_id = $request->class_id;
        $userProfile->save();
        Session::flash('success','Your Profile was updated successfully');
        return back();
    }
}
