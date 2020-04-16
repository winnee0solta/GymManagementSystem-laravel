<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymMembers extends Model
{
    protected $fillable = [
        'user_id',
        'fullname',
        'dob',
        'phone',
        'address',
        'e_phone',
        'shift',
    ];
}
