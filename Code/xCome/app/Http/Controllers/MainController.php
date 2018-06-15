<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function allContact() {
        return view("extra.all-contact", array("type" => "boss"));
    }

    public function showContact(){
        return view("extra.contact", array('check' => 1));
    }

    public function checkContact(Request $request) {
//        return view("extra.contact", array('check' => 3));
        return view("extra.contact", array('check' => 3));

    }

    public function criticism(Request $request) {
        if ($request->method() == 'GET')
            return view("extra.criticism", array('check' => 1));
        else
            return view("extra.criticism", array('check' => 2));

    }
}
