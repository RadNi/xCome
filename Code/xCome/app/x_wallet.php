<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_wallet extends Model
{
    //

    protected $fillable= ['cash', 'primary_cash', 'user_id', 'address', 'type'];

    protected $primaryKey = 'address';
}
