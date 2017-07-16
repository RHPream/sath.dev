<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable = ['subject_id','description'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
