<?php

namespace App\Http\Controllers\Users;

use App\Models\ExamQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{

    public function index()
    {
        $questions = ExamQuestion::all();
        return view('exam.question',compact('questions'));
    }
    public function judge(Request $request)
    {
        $count = 0;
        for($i=1;$i<=2;$i++)
        {
            $key = 'ques'.$i;
            $ans = 'ans'.$i;

            if($request->$ans) {
                if(ExamQuestion::where('id','=',$request->$key)->first()->answer==$request->$ans)
                {
                    $count++;
                } else
                {
                    $count -= .25;
                }
            }
        }
        echo $count;
    }
}
