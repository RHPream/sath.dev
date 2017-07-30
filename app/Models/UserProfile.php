<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['user_id','balance','image','last_payment_amount','last_payment_date'];
    public function userclass($id)
    {
        return UserClass::where('id',$id)->first();
    }
}
