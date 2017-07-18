<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearWiseExam extends Model
{
    protected $fillable = ['university','unit','year','slug'];

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
