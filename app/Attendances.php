<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $fillable = [
        'member_id',
        'status',
    ];
}
