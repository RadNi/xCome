<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forget_verifier extends Controller
{
    public function rules(Request $request){
        return [
            'type' => 'required',
            'phoneNumber' => array('required','regex:/(\+98|0)?9\d{9}/'),
            'email' => array('required','regex:/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/'),
        ];
    }
}
