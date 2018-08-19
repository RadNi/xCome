<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_transaction extends Model
{

    protected $fillable = ['value', 'calender'];
    protected $primaryKey = 'transaction_id';

    public function x_users() {
        return $this -> belongsToMany(X_USER::class, 'x_user_x_transaction', 'x_transaction_id', 'x_user_id');
    }
}
