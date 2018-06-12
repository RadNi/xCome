<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showForget() {
        return view("users.forget", array('check' => false));
    }

    public function showLogin() {
        return view("users.login", array('check' => false));
    }

    public function checkLogin(Request $request) {
        return view("users.login", array('check' => true));

    }

    public function showRegister(Request $request) {
        return view("users.register", array('check' => false));
    }

    public function checkRegister(Request $request) {
        return view("users.register", array('check' => true));
    }

    public function profile(Request $request) {
        return view("users.profile." . $request->mode, array('check' => true));
    }
}
