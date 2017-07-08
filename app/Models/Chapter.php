<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['name','subject_id','slug','description'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
