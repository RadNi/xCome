<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class x_user extends Model
{

    protected $fillable = ['name', 'username', 'email', 'family_name', 'phonenumber', 'national_id', 'address', 'type', 'password'];

//$table->string('name', 25);
//$table->string('family_name', 20);
//$table->string('username', 25)->unique();
//$table->string('password', 25);
//$table->string('email', 25);
//$table->string('phoneNumber', 15);
//$table->string('national_id', 12)->unique();
//$table->text('address');
//$table->enum('type', ['user', 'clerk', 'manager']);


    public function x_transactions() {
        return $this -> belongsToMany(X_Transaction::class);
    }

//    public function rules(\Illuminate\Http\Request $request){
//        return [
//            'name' => 'min:10',
//        ];
//    }
}
