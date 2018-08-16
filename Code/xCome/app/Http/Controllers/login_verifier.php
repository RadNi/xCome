<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_verifier extends Controller
{
    public function rules(Request $request){
        return [
            'password' => 'required|min:5',
            'username' => 'required|unique',
        ];
    }
}
