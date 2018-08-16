<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_cookie extends Model
{
    protected $fillable = ['token', 'ip', 'exp_date', 'user_id'];
}
