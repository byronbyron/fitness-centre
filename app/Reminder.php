<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded = [];

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
