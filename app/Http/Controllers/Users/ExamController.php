<?php

namespace App\Http\Controllers\Users;

use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamRanking;
use App\Models\Footer;
use App\Models\Lecture;
use App\Models\Subject;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $corrects = [];
        $wrongs = [];
        for($i=1;$i<=$count;$i++)
        {
            $key = 'ques'.$i;
            $ans = 'ans'.$i;
            $qa = ExamQuestion::where('id','=',$request->$key)->first();
            if($request->$ans) {
                if($qa->answer==$request->$ans) {
                    $corrects[$i]= [
                        'question' => $qa->question,
                        'answer' => $qa->answer
                    ];
                    $res++;
                } else {
                    $wrongs[$i] = [
                        'question' => $qa->question,
                        'answer' => $qa->answer,
                        'your_answer' => $request->$ans
                    ];
                    $res -= .25;
                }
            }
        }
        $user = Auth::user()->id;

        $insert = new ExamRanking();
        $insert->exam_id = $qa->exam_id;
        $insert->marks = $res;
        $insert->user_id = $user;
//        $insert->save();

        $rankings = ExamRanking::where('exam_id',$qa->exam_id)->orderBy('marks','desc')->get();
        $position = 0;
        foreach ($rankings as $r)
        {
            $position++;
            if($r->user_id==$user){
                break;
            }
        }
        $comment = '';
        if($res>=$count*0.8) {
            $comment = 'Good job. Carry on.';
        } elseif ($res>=$count*0.75){
            $comment = 'Nice. Try a bit more';
        } elseif ($res>=$count*0.60){
            $comment = 'Average. Try hardly';
        } elseif ($res>=$count*0.50){
            $comment = 'Bellow average.';
        } elseif ($res>=$count*0.40){
            $comment = 'Poor marks.';
        } else {
            $comment = 'You are in danger zone.';
        }
        Session::flash('success','You got '.$res.' out of '.$count);
        return view('users.exam.result',compact('corrects','wrongs','position','res','comment'));
    }
    public function finalModelTest()
    {
        $class = Auth::user()->userProfile->class_id;
        if($class) {
            $exams = Exam::where('is_final','!=',0)->where('class_id',$class)->get();
            return view('users.final.finals',compact('exams'));
        }
        Session::flash('success','Please give us your class for exact advice.');
        return back();
    }
    public function lectureWiseExams()
    {
        $class = Auth::user()->userProfile->class_id;
        if($class) {
            $lectures = Lecture::where('class_id',$class)->get();
            return view('users.lecture.lecture',compact('lectures'));
        }
        Session::flash('success','Please give us your class for exact advice.');
        return back();
    }
    public function examPaper($slug,$own)
    {
        $exam = Exam::where('slug',$slug)->where('owns',$own)->firstOrFail();
        if($exam->is_final) {
            $user = Auth::user()->id;
            $up = UserProfile::where('id',$user)->firstOrFail();
            if(floatval($up->balance)>1000){
                $up->balance -=1000;
                $up->save();
                $questions = ExamQuestion::where('exam_id',$exam->id)->get();
                $numberOfQuestion = count($questions);
                $time = $numberOfQuestion/2;
                Session::flash('success','Your exam has began. For your '.$numberOfQuestion.' question you have just '.$time.' minute. After this time your exam paper will automatically submitted. Good luck !!!');
                return view('users.exam.exam',compact('exam','questions'));
            } else {
                Session::flash('warning','Insufficient balance for participate this exam.');
                return back();
            }
        }
        $questions = ExamQuestion::where('exam_id',$exam->id)->get();
        $numberOfQuestion = count($questions);
        $time = $numberOfQuestion/2;
        Session::flash('success','Your exam has began. For your '.$numberOfQuestion.' question you have just '.$time.' minute. After this time your exam paper will automatically submitted. Good luck !!!');
        return view('users.exam.exam',compact('exam','questions'));

    }
    public function subjectWiseExams()
    {
        $class = Auth::user()->userProfile->class_id;
        if($class) {
            $subjects = Subject::where('class',$class)->get();
            return view('users.subject.subjects',compact('subjects'));
        }
        Session::flash('success','Please give us your class for exact advice.');
        return back();
    }
    public function yearWiseExams()
    {
        $class = Auth::user()->userProfile->class_id;
        if($class) {
            $exams = Exam::where('year_id','!=',0)->where('class_id',$class)->get();
            return view('users.year.years',compact('exams'));
        }
        Session::flash('success','Please give us your class for exact advice.');
        return back();
    }
}
