<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_wallet extends Model
{
    //

    protected $fillable= ['cash', 'primary_cash', 'user_id', 'address'];

    protected $primaryKey = 'address';
}
