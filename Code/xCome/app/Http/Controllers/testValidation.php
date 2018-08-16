<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testValidation extends Controller
{
    public function testShow(){
        return view('test');
    }

    public function test(Request $request){
        return $request->name;
    }

    public function rules(\Illuminate\Http\Request $request){
        return [
            'name' => 'min:10',
        ];
    }
}
