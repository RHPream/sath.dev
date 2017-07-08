<?php

namespace App\Http\Controllers\Admins;

use App\Models\AnswerOption;
use App\Models\Exam;
use App\Models\ExamCategory;
use App\Models\ExamQuestion;
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
        $exams = Exam::all();
        return view('admin.exam.index',compact('exams'));
    }
    public function create()
    {
        $categories = ExamCategory::all();
        return view('admin.exam.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
            'category' => 'required',
        ]);
        $exam = Exam::create(['name'=>$request->name,'subject'=>$request->subject,'category_id'=>$request->category,'slug'=>$request->slug]);

        return $this->index();
    }
    public function edit($id)
    {
        $categories = ExamCategory::all();
        $exam = Exam::where('id',$id)->firstOrFail();
        return view('admin.exam.edit',compact(['categories','exam']));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
            'category' => 'required',
        ]);
        $exam = Exam::where('id',$id)->firstOrFail();

        $exam->name = $request->name;
        $exam->subject = $request->subject;
        $exam->category_id = $request->category;
        $exam->slug = $request->slug;

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
}
