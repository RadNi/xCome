<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showForget() {
        return view("user.forget", array('check' => false));
    }

    public function showLogin() {
        return view("user.login", array('check' => false));
    }

    public function checkLogin(Request $request) {
        return view("user.login", array('check' => true));

    }

    public function showRegister(Request $request) {
        return view("user.register", array('check' => false));
    }

    public function checkRegister(Request $request) {
        return view("user.register", array('check' => true));
    }

    public function info(Request $request) {
        $arr = explode("/", $request->path());
        return view($arr[0].".user-info", array('type' => $arr[0]));
    }

    public function transactions(Request $request) {
        $arr = explode("/", $request->path());
        return view($arr[0].".transaction-history", array('type' => $arr[0]));
    }

    public function profile(Request $request) {
        $arr = explode("/", $request->path());
        $str = '';
        if (sizeof($arr) == 2)
            $arr = array_add($arr, 3,"default");
        foreach($arr as $ar){
            $str.=$ar.".";
        }
        $str = substr($str, 0, strlen($str)-1);
        return view($str, array('type' => $arr[0]));

    }
}
