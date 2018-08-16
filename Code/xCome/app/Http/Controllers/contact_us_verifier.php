<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contact_us_verifier extends Controller
{
    public function rules(Request $request){
        return [
            'message' => 'required',
        ];
    }
}
