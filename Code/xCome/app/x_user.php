<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_user extends Model
{
    public function x_transactions() {
        return $this -> belongsToMany(X_Transaction::class);
    }

    public function rules(\Illuminate\Http\Request $request){
        return [
            'name' => 'min:10',
        ];
    }
}
