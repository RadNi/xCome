<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLogin() {

    }

    public function checkLogin(Request $request) {

    }

    public function showRegister(Request $request) {
        return view("users.register", array('check' => false));
    }

    public function checkRegister(Request $request) {
        $check = true;
        return view("users.register", array('check' => true));
    }
}
