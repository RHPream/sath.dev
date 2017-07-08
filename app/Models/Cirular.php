<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cirular extends Model
{
    public $fillable = ['university_id','file','marque','description','unit','link','type'];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
