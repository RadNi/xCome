<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_wallet extends Model
{
    //

    protected $fillable= ['cash'];

    protected $primaryKey = 'address';
}
