<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ExamRanking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function category($id)
    {
        return ExamCategory::where('id',$id)->first()->name;
    }
}
