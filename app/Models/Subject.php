<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name','class','origin','description','slug'];
    public function class_output($id)
    {
        return UserClass::where('id',$id)->first();
    }
}
