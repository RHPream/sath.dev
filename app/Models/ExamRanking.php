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
    public function position($exam)
    {
        $ranginks = ExamRanking::where('exam_id',$exam)->orderBy('id','asc')->get();
        $count = 0;
        foreach ($ranginks as $r)
        {
            $count++;
            if($r->id == $this->id){
                break;
            };
        }

        return $count;
    }
}
