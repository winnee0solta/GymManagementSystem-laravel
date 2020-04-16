<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymMemberStatus extends Model
{
   protected $fillable = [
        'user_id', 
        'member_id', 
        'weight',
        'height',
        'bmi', 
    ];
}
