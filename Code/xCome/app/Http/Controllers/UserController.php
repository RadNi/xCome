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


//        <input id="email" type="email" name="email" placeholder="Email"><br>
//        <input id="password" type="password" name="password" placeholder="Password"><br>
//        <input id="repass" type="password" name="retryPass" placeholder="Repeat Password"><br>
//        <input id="name" type="name" name="name" placeholder="Name"><br>
//        <input id="family" type="name" name="familyName" placeholder="Family"><br>
//        <input id="username" type="name" name="username" placeholder="Username"><br>
//        {{--<input id="" type="age" name="age" placeholder="age"><br>--}}
//        <input id="address" type="address" name="address" placeholder="address"><br>
//        <input id="captcha" type="text" name="captcha" placeholder="captcha"><br>
//        <input id="person_id" type="text" name="PersonID" placeholder="Person ID"><br>
//        <input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number"><br>
//        <input id="submit" type="submit" value="register">


//        dd($request->except(["_token", "captcha", "repass"]));
//        dd($request -> except(["captcha", "repass"]));
        $data = $request -> except(["captcha", "repass"]);

        $data['family_name'] = $data['familyName'];
        unset($data['familyName']);
        $data['phonenumber'] = $data['CellPhone'];
        unset($data['CellPhone']);
        $data['national_id'] = $data['PersonID'];
        unset($data['PersonID']);
//        dd($data);
        $data['password'] = md5($data['password']);
        $this->x_user->create($data);
//        $data = $request -> except(["_token", "captcha", "repass"]);

//        return x_user::create([
//           'email' => $request->email,
//            'name' => $request->name,
//            'password' => md5($request->password),
//            'family' => $request->family,
//            'username' => $request->username,
//            'address' => $request->address,
//            'person_id' => $request->person_id,
//            'cellphone' => $request->cellphone,
//        ]);



//        return view("extra.register", array('check' => true));
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
