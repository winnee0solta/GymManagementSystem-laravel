<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutritionPlans extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
    ];
}
