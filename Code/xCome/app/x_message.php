<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_message extends Model
{
    protected $fillable = ['creator_id', 'message'];
}
