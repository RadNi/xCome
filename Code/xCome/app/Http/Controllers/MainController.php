<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showContact(){
        return view("extra.contact", array('check' => 1));
    }

    public function checkContact(Request $request) {
//        return view("extra.contact", array('check' => 3));
        return view("extra.contact", array('check' => 2));

    }
}
