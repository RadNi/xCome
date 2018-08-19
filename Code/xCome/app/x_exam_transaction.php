<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_exam_transaction extends Model
{

    protected $fillable = ['transaction_id', 'from', 'to', 'type', 'done', 'clerk_id', 'fee'];
    //
}
