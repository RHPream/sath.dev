<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $fillable = ['exam_id','question','answer',];
    public function option($id)
    {
        return AnswerOption::all()->where('exam_question_id','=',$id);
    }
}
