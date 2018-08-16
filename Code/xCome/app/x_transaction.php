<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_transaction extends Model
{
    public function x_users() {
        return $this -> belongsToMany(X_USER::class);
    }
}
