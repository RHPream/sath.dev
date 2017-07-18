<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public function userclass($id)
    {
        return UserClass::where('id',$id)->first();
    }
}
