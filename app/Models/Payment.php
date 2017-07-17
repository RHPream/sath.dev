<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id','send_from','method','reference','amount','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
