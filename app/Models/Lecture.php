<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['name','subject_id','slug','description','chapter_id'];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
