<?php

namespace App\Http\Controllers;

use App\x_user;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $x_user;
    function __construct(x_user $x_user)
    {
        $this->x_user = $x_user;
    }

    public function showForget() {
        return view("extra.forget", array('check' => false));
    }

    public function showMessages() {
        return view("boss.clerk-messages", array("type" => "boss"));
    }

    public function sendMessage() {
        return view("clerk.send-message", array("type" => "clerk"));
    }

    public function showLogin() {

        return view("extra.login", array('check' => false));
    }

    public function checkLogin(Request $request) {
        return view("extra.login", array('check' => true));

    }

    public function showRegister(Request $request) {

        return view("extra.register", array('check' => false));
    }

    public function checkRegister(Request $request) {

        $data = $request -> except(["captcha", "password_confirmation"]);

        $data['family_name'] = $data['familyName'];
        unset($data['familyName']);
        $data['phonenumber'] = $data['CellPhone'];
        unset($data['CellPhone']);
        $data['national_id'] = $data['PersonID'];
        unset($data['PersonID']);
//        dd($data);
        $data['password'] = md5($data['password']);
//        dd($data);
        $this->x_user->create($data);




//        return view("extra.register", array('check' => true));
    }

    private function makeWallets($user_id) {

    }

    public function info(Request $request) {
        $arr = explode("/", $request->path());
        return view($arr[0].".user-info", array('type' => $arr[0]));
    }

    public function transactions(Request $request) {
        $arr = explode("/", $request->path());
        return view($arr[0].".transaction-history", array('type' => $arr[0]));
    }

    public function getUsersTable(Request $request) {
        $arr = explode("/", $request->path());

        return view("extra.users-table", array('type' => $arr[0]));
    }

    public function getClerksTable(Request $request) {
        $arr = explode("/", $request->path());

        return view("extra.clerks-table", array('type' => $arr[0]));
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
//        dd($str);
        return view($str, array('type' => $arr[0]));

    }
}
