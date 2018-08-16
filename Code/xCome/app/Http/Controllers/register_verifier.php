<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class register_verifier extends Controller
{
    public function rules(\Illuminate\Http\Request $request){
        return [
            'email' => array('required','regex:/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/'),
            'password' => 'required|min:5|confirmed',
            'name' => 'required',
            'familyName' => 'required',
            'username' => 'required|unique:x_users',
            'address' => 'required',
            'PersonID' => 'required|size:10',
            'CellPhone' => array('required','regex:/(\+98|0)?9\d{9}/'),
        ];
    }
}
