<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_pay_transaction extends Model
{
    protected $fillable = ['transaction_id', 'fee', 'type', 'done', 'clerk_id', 'from', 'to'];
}
