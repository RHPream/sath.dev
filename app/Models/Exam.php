<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name','subject','category_id','slug',
    ];

    public function category($id)
    {
        return ExamCategory::where('id',$id)->first();
    }
}
