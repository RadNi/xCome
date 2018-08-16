<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_user extends Model
{

    protected $fillable = ['name', 'username', 'email', 'family_name', 'phonenumber', 'national_id', 'address', 'type', 'password'];

    public function x_transactions() {
        return $this -> belongsToMany(X_Transaction::class);
    }
}
