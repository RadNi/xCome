<?php

namespace App\Http\Controllers;

use App\x_user;
use App\x_wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    protected $x_user;
    protected $x_wallet;

    function __construct(x_user $x_user, x_wallet $x_wallet)
    {
        $this->x_user = $x_user;
        $this->x_wallet = $x_wallet;
    }

    public function showForget() {
        return view("extra.forget", array('check' => false));
    }

    public function checkForget(Request $request){
        //todo
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
//        dd($request);

        $pass = $this->x_user->where("username", $request->username)->get()->first();
//        dd($user->password );
        if (md5($request->password == $pass)) {
            echo 'Authentication succeeded';
            $response = new Response('Hello World');
            $response->withCookie(cookie('name', $request->username, time()));
            dd($response);
        }
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

        $this->makeWallets($this->x_user->create($data)->getKey());




//        return view("extra.register", array('check' => true));
    }



    private function makeWallets($user) {
        foreach (['dollar', 'euro', 'rial'] as $t) {
            $wallet = new x_wallet();
            $wallet->user_id = $user;
            $wallet->address = str_random(24);
            $wallet->cash = '0';
            $wallet->type = $t;
            $wallet->save();
        }
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
