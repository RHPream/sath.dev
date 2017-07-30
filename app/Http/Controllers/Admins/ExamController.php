<?php

namespace App\Http\Controllers\Admins;

use App\Models\AnswerOption;
use App\Models\Exam;
use App\Models\ExamCategory;
use App\Models\ExamQuestion;
use App\Models\ExamRanking;
use App\Models\Subject;
use App\Models\UserClass;
use App\Models\YearWiseExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $exams = Exam::orderBy('id','desc')->get();
        return view('admin.exam.index',compact('exams'));
    }
    public function create()
    {
        $categories = ExamCategory::all();
        $subjects = Subject::all();
        $years = YearWiseExam::all();
        return view('admin.exam.create',compact('categories','subjects','years'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
        ]);
        $is_final = isset($request->is_final)?1:0;
        $owns = isset($request->owns)?1:0;
        $is_final = $request->category==4?1:$is_final;
        $year = $request->year?$request->year:0;
        $subject = Subject::where('id',$request->subject)->firstOrFail();
        $exam = Exam::create(
            [
                'name'=>$request->name,
                'subject'=>$request->subject,
                'category_id'=>$request->category,
                'slug'=>$request->slug,
                'class_id'=>$subject->class,
                'owns'=>$owns,
                'is_final'=>$is_final,
                'year_id'=>$year
            ]);

        return $this->index();
    }
    public function edit($id)
    {
        $categories = ExamCategory::all();
        $exam = Exam::where('id',$id)->firstOrFail();
        $subjects = Subject::all();
        $years = YearWiseExam::all();
        return view('admin.exam.edit',compact('categories','subjects','years','exam'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
        ]);
        $is_final = isset($request->is_final)?1:0;
        $owns = isset($request->owns)?1:0;
        $is_final = $request->category==4?1:$is_final;
        $year = $request->year?$request->year:0;
        $subject = Subject::where('id',$request->subject)->firstOrFail();
        $exam = Exam::where('id',$id)->firstOrFail();

        $exam->name = $request->name;
        $exam->subject = $request->subject;
        $exam->category_id = $request->category;
        $exam->slug = $request->slug;
        $exam->class_id = $subject->class;
        $exam->owns = $owns;
        $exam->is_final = $is_final;
        $exam->year_id = $year;

        $exam->save();

        return $this->index();
    }
    public function setQuestion($id)
    {
        $exam = Exam::where('id',$id)->firstOrFail();
        return view('admin.exam.setQuestion',compact('exam'));
    }
    public function addQuestion(Request $request,$id)
    {
        $ques = $request->input('ques');

        foreach ($ques as $que)
        {
            $question = ExamQuestion::create(['exam_id'=>$id,'question'=>$que['question'],'answer'=>$que['answer']]);
            if ($que['option1'])
            {
                $option = AnswerOption::create(['exam_question_id'=>$question->id,'option'=>$que['option1']]);
            }
            if ($que['option2'])
            {
                $option = AnswerOption::create(['exam_question_id'=>$question->id,'option'=>$que['option2']]);
            }
            if ($que['option3'])
            {
                $option = AnswerOption::create(['exam_question_id'=>$question->id,'option'=>$que['option3']]);
            }
            if ($que['option4'])
            {
                $option = AnswerOption::create(['exam_question_id'=>$question->id,'option'=>$que['option4']]);
            }

        }

        return back();
    }
    public function destroy($id)
    {
        Exam::where('id',$id)->delete();
        ExamQuestion::where('exam_id',$id)->delete();
        ExamRanking::where('exam_id',$id)->delete();
        return back();
    }
}
