<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name','subject','category_id','slug','is_final','year','class_id'
    ];

    public function category($id)
    {
        return ExamCategory::where('id',$id)->first();
    }
    public function year()
    {
        return $this->belongsTo(YearWiseExam::class);
    }
}
