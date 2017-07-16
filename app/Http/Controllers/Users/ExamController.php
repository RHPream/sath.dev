<?php

namespace App\Http\Controllers\Users;

use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamRanking;
use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function index($slug)
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        $exam = Exam::where('slug',$slug)->first();
        $questions = ExamQuestion::where('exam_id',$exam->id)->get();
        return view('exam.paper',compact('questions','dropdowns','exam'));
    }
    public function judge(Request $request)
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        $count = count($request->input());
        $count = $count%2==0?$count/2:($count-1)/2;
        $res = 0;
        for($i=1;$i<=$count;$i++)
        {
            $key = 'ques'.$i;
            $ans = 'ans'.$i;

            if($request->$ans) {
                if(ExamQuestion::where('id','=',$request->$key)->first()->answer==$request->$ans)
                {
                    $res++;
                } else
                {
                    $res -= .25;
                }
            }
        }
        if(Auth::user()){
            $user = Auth::user()->id;
        } else {
            $user = 0;
        }
        $insert = new ExamRanking();
        $insert->exam_id = 1;
        $insert->marks = $count;
        $insert->user_id = $user;
        $insert->save();

        $rankings = ExamRanking::where('exam_id',1)->orderBy('marks','desc')->get();
        $current = $insert->id;

        return view('exam.ranking',compact('rankings','current','dropdowns'));


    }
    public function finalModelTest()
    {
        $dropdowns = Footer::where('parent_name',0)->get();
        return view('exam.final',compact('dropdowns'));
    }
}
