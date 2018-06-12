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

    public function info(Request $request) {
        return view("users.user-info", array('check' => true));
    }

    public function transactions(Request $request) {
        return view("users.transaction-history", array('checked' => true));
    }

    public function profile(Request $request) {
        if ($request->mode) {
            return view("users.profile." . $request->mode, array('check' => true));
        }else
            return view("users.profile.wallet", array('check' => true));
    }
}
