<?php

namespace App\Http\Controllers;

use App\x_exam_transaction;
use App\x_transaction;
use App\x_user;
use App\x_wallet;
use App\x_cookie;
use App\x_exam;
use App\x_fee_transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function MongoDB\BSON\toJSON;
use PhpParser\Node\Expr\List_;
use function Sodium\add;

class UserController extends Controller
{

    static protected $BOSS_USER_ID = 4;
    static protected $COMPANY_WALLET_ADDRESS = 'AAAAAAAAAAAAAAAAAAAAAAAA';


    protected $x_user;
    protected $x_wallet;
    protected $x_cookie;
    protected $x_exams;
    protected $x_transaction;
    protected $x_exam_transactions;
    protected $x_fee_transactions;


    function __construct(x_fee_transaction $x_fee_transactions, x_user $x_user, x_wallet $x_wallet, x_cookie $x_cookie, x_exam $x_exam, x_transaction $x_transaction, x_exam_transaction $x_exam_transaction)
    {
        $this->middleware('App\Http\Middleware\\XCookie');
        $this->x_user = $x_user;
        $this->x_wallet = $x_wallet;
        $this->x_cookie = $x_cookie;
        $this->x_exams = $x_exam;
        $this->x_transaction = $x_transaction;
        $this->x_exam_transactions = $x_exam_transaction;
        $this->x_fee_transactions = $x_fee_transactions;
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
        if ($user == null)
            return redirect(route('User.showLogin'));
        $pass = $user -> password;
        if (strcmp(md5($request->password), $pass) == 0) {
//            echo 'Authentication succeeded';

            $response = new Response('Authentication succeeded');

            $token = str_random(25);
//            dd(date ("Y-m-d H:i:s", time()));
//            $response->withCookie(cookie('x_user_cookie', $token, 1, null, null, false, false));

            $this->x_cookie->where('user_id' , $user->id)->delete();
            $this->x_cookie->create([
                'token' => $token,
                'ip' => $request->ip(),
                'exp_date' => date ("Y-m-d H:i:s", time()+60000),
                'user_id' => $user->id
                ]);

//            dd($response);
            return redirect('profile')->withCookie(cookie('x_user_cookie', $token, 60, null, null, false, false));
//            return $response;
        }
        return view("extra.login", array('check' => true));

    }

    public function showRegister(Request $request) {

        return view("extra.register", array('check' => false));
    }

    private function makeBoss($data) {
        $data['type'] = 'manager';
        $boss = $this->x_user->create($data)->getKey();
        $this->makeWallets($boss);
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

//        $this->makeBoss($data);

        $user = $this->x_user->create($data)->getKey();


        $this->makeWallets($user);




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

    private function fill_wp_items($type) {
        $wp_items=[];
        switch ($type) {
            case 'user':
//                $item = [
//                    'id' => 'exam-reg',
//                    'link' => '#',
//                    'text' => 'Exam Registration'
//                ];
//                array_push($wp_items, $item);
                $wp_items = [
                    [
                        'id' => 'exam-reg',
                        'link' => route('profile.exam-reg'),
                        'text' => 'Exam Registration'
                    ],
                    [
                        'id' => 'apply-pay',
                        'link' => '#',
                        'text' => 'Application Payment'
                    ],
                    [
                        'id' => 'foreign-pay',
                        'link' => '#',
                        'text' => 'Foreign Payment'
                    ],
                    [
                        'id' => 'retr-mon',
                        'link' => '#',
                        'text' => 'Retrieve Money'
                    ],
                    [
                        'id' => 'int-pay',
                        'link' => '#',
                        'text' => 'Internal Transaction'
                    ],
                    [
                        'id' => 'wallet',
                        'link' => route('profile'),
                        'text' => 'Wallets Page'
                    ]
                ];
        }
        return $wp_items;
    }

    private function fill_hyperLinks($type) {
        $hyperLinks = [];
        switch ($type) {
            case "user":
                $hyperLinks = [
                    [
                        "id" => "mainpage",
                        "link" => route('profile'),
                        "text" => "Main Page"
                    ],
                    [
                        "id" => "userinfo",
                        "link" => "#",
                        "text" => "User Information"
                    ],
                    [
                        "id" => "transactions",
                        "link" => "#",
                        "text" => "Transactions History"
                    ]
                ];
        }
        return $hyperLinks;
    }

    public function exam_reg(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $exams = $this->x_exams->select(['name', 'exam_date', 'exam_id', 'price', 'fee'])->where('exam_date' ,'>=', date ("Y-m-d H:i:s", time()))->get();
//        dd($exams);
        $exams_data = [];
        foreach ($exams as $exam) {
            array_push($exams_data, [
                'id' => $exam->exam_id,
                'name' => $exam->name,
                'date' => $exam->exam_date,
                'fee' => $exam->fee,
                'price' => $exam->price
            ]);
        }
        $data = [
            'exams' => $exams_data,
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type)
        ];
//        dd($data);

        return view('new.exam-reg', [
            'x_data' => json_encode($data)
        ]);
    }

    private function feePayment($value,  $user){

        $boss = $this->x_user->where('type', '=', 'manager')->firstOrFail();
        $trans = $this->newTransaction($value, date ("Y-m-d H:i:s", time()), [$user->id, $boss->id]);

//        dd($trans);
        $new_fee_trans = $this->x_fee_transactions->create([
            'transaction_id' => $trans->transaction_id,
            'from' =>  $user->id,
            'too' => $boss->id
        ]);

        return $new_fee_trans;

    }


    private function newTransaction($value, $time, array $userID) {
        $trans = $this->x_transaction->create([
            'value' => $value,
            'calender' => $time
        ]);
//        dd($trans);
        $temp = x_transaction::findOrFail($trans->transaction_id);
//        dd($temp);
//        dd(typeOf($temp));
        $temp->x_users()->attach($userID);
        $temp->save();


//        dd($trans);
        return $trans;
    }

    public function buyExam(Request $request) {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        $exam = $this->x_exams->where('exam_id' ,'=', $request->exam)->first();

        if (sizeof($exam)) {

//            dd(sizeof($exam));
            $rial = $this->x_wallet->where('user_id', '=', $user->id)->where('type', '=', 'rial')->first();

            if ((integer)$exam->price + (integer)$exam->fee > $rial->cash)
                return \response('not enough money for this exam. Please charge your Rial wallet'); // TODO for this kind of errors we should make a page
//                dd('not enough mouney !'. $exam->price. ' '. $rial->cash. ' '. $rial->user_id);
//            dd($rial);
            $rial->update([
                'cash' => (string)((integer)$rial->cash - (integer)$exam->price - (integer)$exam->fee)
            ]);

            $trans = $this->newTransaction($exam->price, date ("Y-m-d H:i:s", time()), [$user->id]);
            $new_trans=$this->x_exam_transactions->create([
                'transaction_id' => $trans->transaction_id,
                'fee' => $exam->fee,
                'type' => $exam->name,
                'from' => $rial->address,
                'to' => UserController::$COMPANY_WALLET_ADDRESS,
                'done' => false,
                'clerk_id' => null,
            ]);

            $this->feePayment($exam->fee, $user);

            return \response('Exam bought successfully');     //TODO or this kind of succeed we should make a page
//            dd($rial);
//            dd($request->exam);
        }
        else {
            return \response("Exam not found !!", 401);
        }

    }



    private function getUser(Request $request) {
        $id = $request->x_user_id;
        $user = $this->x_user->where('id', '=', $id)->first();
        return $user;
    }

    public function profile(Request $request)
    {


//        $arr = explode("/", $request->path());
//        $str = '';
//        if (sizeof($arr) == 2)
//            $arr = array_add($arr, 3,"default");
//        foreach($arr as $ar) {
//            $str .= $ar . ".";
//        }
//        $str = substr($str, 0, strlen($str)-1);
//        //        dd($arr[0]);
//        return view($str, array('type' => $arr[0]));

//        return view('profile');


        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }
        $id = $request->x_user_id;
        $sending_data = array();
        switch ($user->type) {
            case "user":
                $wallets = $this->x_wallet->select(['type', 'cash', 'address'])
                    ->where('user_id', '=', $id)->get();
                foreach ($wallets as $wallet) {
                    array_push($sending_data,
                        [
                            'name' => (string)$wallet->type,            //TODO      should add address and other information
                            'amount' => (string)$wallet->cash,
                            'address' => $wallet->address
                        ]);
//                            array((string)$wallet->type => (string)$wallet->cash));
                }
//                    dd(array('data' => json_encode($sending_data)));
//                    dd($sending_data);
//                    $sending_data = array_add($sending_data, {'type':'user'});
//                    dd(json_encode($wallets));
//                    $sending_data = array('wallets' => $sending_data);
                $wp_items = $this->fill_wp_items($user->type);
                $hyperLinks = $this->fill_hyperLinks($user->type);

                $sending_data = [
                    'wallets' => $sending_data,
                    'type' => $user->type,
                    'wp_items' => $wp_items,
                    'hyperLinks' => $hyperLinks
                ];
//                dd($sending_data);
//                    array_push($sending_data, 'type' => 'user');
//                    dd($sending_data);
//                    dd(array('type' => 'user'));
                $arr = array('x_data' => json_encode($sending_data));
//                    $arr = array_add($arr, 'type', 'user');
//                    dd($arr);
//                    dd($arr);
                return view('new.default', $arr);
                break;
            case "clerk":

                break;
            case "boss":

                break;
        }
    }

}
