<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name','subject','category_id','slug','is_final','year_id','class_id','owns'
    ];

    public function category($id)
    {
        return ExamCategory::where('id',$id)->first();
    }
    public function year()
    {
        return $this->belongsTo(YearWiseExam::class);
    }
    public function UserClass($id)
    {
        return UserClass::where('id',$id)->first();
    }
    public function subjects($id)
    {
        return Subject::where('id',$id)->first();
    }
}
