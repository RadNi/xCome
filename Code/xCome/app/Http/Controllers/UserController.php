<?php

namespace App\Http\Controllers;

use App\x_user;
use App\x_wallet;
use App\x_cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    protected $x_user;
    protected $x_wallet;
    protected $x_cookie;

    function __construct(x_user $x_user, x_wallet $x_wallet, x_cookie $x_cookie)
    {
        $this->x_user = $x_user;
        $this->x_wallet = $x_wallet;
        $this->x_cookie = $x_cookie;
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

        $user = $this->x_user->where("username", $request->username)->get()->first();
        $pass = $user -> password;
        if (strcmp(md5($request->password), $pass) == 0) {
//            echo 'Authentication succeeded';

            $response = new Response('Authentication succeeded');

            $token = str_random(25);
//            dd(date ("Y-m-d H:i:s", time()));
            $response->withCookie(cookie('x_user_cookie', $token, time()));

            $this->x_cookie->where('user_id' , $token)->delete();
            $this->x_cookie->create([
                'token' => $token,
                'ip' => $request->ip(),
                'exp_date' => date ("Y-m-d H:i:s", time()+5000),
                'user_id' => $user->id
                ]);

//            dd($response);
            return $response;
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
        $data['type'] = 'user';

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
        $id = $request->x_user_id;
        $user = $this->x_user->where('id', '=', $id)->first();
        if ($user != null){
//            dd($user->type);
            $sending_data = array();
            switch ($user->type){
                case "user":
                    $wallets = $this->x_wallet->select('type', 'cash')
                        ->where('user_id', '=', $id)->get();
                    foreach ($wallets as $wallet){
                        array_push($sending_data,
                            array((string)$wallet->type => (string)$wallet->cash));
                    }
                    return json_encode($sending_data);
                    break;
                case "clerk":

                    break;
                case "boss":

                    break;
            }
        } else {
            return \response("You need to login again", 401);
        }
    }
}
