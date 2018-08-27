<?php

namespace App\Http\Controllers;

use App\x_clerk_income;
use App\x_exam_transaction;
use App\x_exchange_transaction;
use App\x_message;
use App\x_pay_transaction;
use App\x_transaction;
use App\x_user;
use App\x_wallet;
use App\x_cookie;
use App\x_exam;
use App\x_fee_transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use function MongoDB\BSON\toJSON;
use PhpParser\Node\Expr\List_;
use function PHPSTORM_META\elementType;
use function Sodium\add;

class UserController extends Controller
{

    static protected $BOSS_USER_ID = 4;
    static protected $COMPANY_WALLET_ADDRESS = [        //TODO      still wallet is not real !!
        'rial' => 'AAAAAAAAAAAAAAAAAAAAAAAA',
        'dollar' => 'AAAAAAAAAAAAAAAAAAAAAAAB',
        'euro' => 'AAAAAAAAAAAAAAAAAAAAAAAC'
    ];

    static protected $EXCHANGE_BUY = [
        'dollar' => 10.800,
        'euro' => 13.320,
    ];
    static protected $EXCHANGE_SELL = [
        'dollar' => 11,
        'euro' => 14.123,
    ];


    static protected $APPLY_PAYMENT_FEE = 0.32;
    static protected $INTERNAL_TRANSACTION = 0.2;


    protected $x_user;
    protected $x_wallet;
    protected $x_cookie;
    protected $x_exams;
    protected $x_transaction;
    protected $x_exam_transactions;
    protected $x_fee_transactions;
    protected $x_pay_transactions;
    protected $x_exchange_transactions;
    protected $x_clerk_income;
    protected $x_message;


    function __construct(x_message $x_message, x_clerk_income $x_clerk_income, x_exchange_transaction $x_exchange_transaction, x_pay_transaction $x_pay_transaction, x_fee_transaction $x_fee_transactions, x_user $x_user, x_wallet $x_wallet, x_cookie $x_cookie, x_exam $x_exam, x_transaction $x_transaction, x_exam_transaction $x_exam_transaction)
    {
        $this->middleware('App\Http\Middleware\\XCookie');
        $this->x_user = $x_user;
        $this->x_wallet = $x_wallet;
        $this->x_cookie = $x_cookie;
        $this->x_exams = $x_exam;
        $this->x_transaction = $x_transaction;
        $this->x_exam_transactions = $x_exam_transaction;
        $this->x_fee_transactions = $x_fee_transactions;
        $this->x_pay_transactions = $x_pay_transaction;
        $this->x_exchange_transactions = $x_exchange_transaction;
        $this->x_clerk_income = $x_clerk_income;
        $this->x_message = $x_message;
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

    public function clerk_send_message(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

//        return $user->getAttributes()['id'];
        $this->x_message->create([
            'creator_id' => $user->getAttributes()['id'],
            'message' => $request->message
        ]);


        return 'done';

    }

    public function show_clerk_send_message(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
        ];

        return view('new.clerk_send_message', ['x_data' => json_encode($data)]);

    }



    public function sendMessage() {



//        return view("clerk.send-message", array("type" => "clerk"));
    }

    public function showLogin() {

        return view("new.login");
    }

    public function logout(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        $this->x_cookie->where('token', '=', $request->cookie('x_user_cookie'))->delete();

        return \response()->redirectToRoute('User.showLogin');
//        return $request->cookie('x_user_cookie');
//        \Symfony\Component\HttpFoundation\Cookie::forget($request->cookie('x_user_cookie'));
//        Cookie::forget($request->cookie('x_user_cookie'));

//        return redirect('login')->withCookie()

//        $request->cookie('x_user_cookie')->;

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
                'exp_date' => date ("Y-m-d H:i:s", time()+3600),
                'user_id' => $user->id
                ]);

//            dd($response);
//            $this->sendEmail($user->email, "Login", $user->name, ["You are in now"]);
            return redirect('profile')->withCookie(cookie('x_user_cookie', $token, 60, null, null, false, false));
//            return $response;
        }

        return view("new.login");

//        return view("extra.login", array('check' => true));

    }

    public function showRegister(Request $request) {

        return view("extra.register", array('check' => false));
    }

    private function makeBoss($data) {
        $data['type'] = 'manager';
        $boss = $this->x_user->create($data)->getKey();
//        $this->makeWallets($boss);
//        dd();
//        $temp =
//        UserController::$COMPANY_WALLET_ADDRESS['dollar'] = $this->x_wallet->where('user_id', '=', $boss)->where('type', '=', 'dollar')->first()->getOriginal('address');
//        UserController::$COMPANY_WALLET_ADDRESS['rial'] = $this->x_wallet->where('user_id', '=', $boss)->where('type', '=', 'rial')->first()->getOriginal('address');
//        UserController::$COMPANY_WALLET_ADDRESS['euro'] = $this->x_wallet->where('user_id', '=', $boss)->where('type', '=', 'euro')->first()->getOriginal('address');
        foreach (UserController::$COMPANY_WALLET_ADDRESS as $k => $v) {
            $this->x_wallet->create([
                'user_id' => $boss,
                'address' => $v,
                'type' => $k,
                'primary_cash' => '0',
                'cash' => '0'
        ]);
        }
//        dd(UserController::$COMPANY_WALLET_ADDRESS);
    }

    public function checkRegister(Request $request) {
//        dd($request);
        $data = $request -> except(["captcha", "password_confirmation"]);

        $data['family_name'] = $data['familyName'];
        unset($data['familyName']);
        $data['phoneNumber'] = $data['CellPhone'];
        unset($data['CellPhone']);
//        $data['national_id'] = $data['national_id'];
//        unset($data['national_id']);
//        dd($data);
        $data['password'] = md5($data['password']);
        $data['type'] = 'user';


//        dd($data);

//        $this->makeBoss($data);
        $user = $this->x_user->create($data)->getKey();


        $this->makeWallets($user);



        return \response()->redirectToRoute('User.showLogin');


//        return view("extra.register", array('check' => true));
    }



    private function makeWallets($user) {
        foreach (['dollar', 'euro', 'rial'] as $t) {
            $wallet = new x_wallet();
            $wallet->user_id = $user;
            $wallet->address = str_random(24);
            $wallet->cash = '0';
            $wallet->primary_cash = '0';
            $wallet->type = $t;
            $wallet->save();
        }
    }

    public function active_user(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

//        return (boolean)$request->active;

        $user = $this->x_user->where('id', '=', $request->value)->firstOrFail();

        $user->update([
            'active' => $request->active
        ]);


        return $user;
    }

    public function getUsersTable(Request $request) {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        $users = $this->x_user->where('type', '=', 'user')->get();

        $table = [
            'ths' => array_keys((array)json_decode(json_encode($users[0]))),
            'trs' => [
                ]
//            'ths' => $users
        ];

        foreach ($users as $user) {
            $tds = ['tds' => []];

            foreach (json_decode(json_encode($user)) as $k => $v) {
                array_push($tds['tds'], ['class' => $k, 'value' => $v]);
            }

            array_push($table['trs'], $tds);
        }

        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'table' => $table
        ];

        return view('new.users-table', ['x_data' => json_encode($data)]);



//        $arr = explode("/", $request->path());
//
//        return view("extra.users-table", array('type' => $arr[0]));
    }

    public function add_clerk(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        $clerk = $request->clerk;
        unset($clerk['repass']);
        unset($clerk['captcha']);
        $income = $clerk['income'];
        unset($clerk['income']);
        $clerk['password'] = md5($clerk['password']);
        $clerk['type'] = 'clerk';
//        return $clerk;

        $clerk_user = $this->x_user->create($clerk);

//        $clerk['value'] = $income;

//        return $clerk_user->getKey();

        $clerk = [
            'value' => $income,
            'clerk_id' => $clerk_user->getKey()
        ];

        $this->x_clerk_income->create($clerk);


        return $clerk_user;


    }

    public function getClerksTable(Request $request) {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

//        $trans_id = $this->x_transaction->join($table_name, $table_name.'.transaction_id', '=', 'x_transactions.transaction_id')->get();


        $users = $this->x_user->join('x_clerk_incomes', 'x_users.id', '=', 'x_clerk_incomes.clerk_id')->where('type', '=', 'clerk')->get();


        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'table' => ''
        ];

        if (sizeof($users) < 1 )
            return view('new.clerks-table', ['x_data' => json_encode($data)]);

        $table = [
            'ths' => array_keys((array)json_decode(json_encode($users[0]))),
            'trs' => [
            ]
//            'ths' => $users
        ];

        foreach ($users as $user) {
            $tds = ['tds' => []];

            foreach (json_decode(json_encode($user)) as $k => $v) {
                array_push($tds['tds'], ['class' => $k, 'value' => $v]);
            }

            array_push($table['trs'], $tds);
        }

        $data['table'] = $table;

//        $data = [
//            'type' => $user->type,
//            'hyperLinks' => $this->fill_hyperLinks($user->type),
//            'wp_items' => $this->fill_wp_items($user->type),
//            'table' => $table
//        ];

        return view('new.clerks-table', ['x_data' => json_encode($data)]);



//        $arr = explode("/", $request->path());
//
//        return view("extra.users-table", array('type' => $arr[0]));
    }




    public function buy_currency(Request $request) {


        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


//        return $request->wallet_name;

        $rial_amount = UserController::$EXCHANGE_BUY[$request->wallet_name] * (int)$request->amount;

        $requested_wallet = $this->x_wallet->where('user_id', '=', $user->getKey())->where('type', '=', $request->wallet_name)->first();

        $user_rial_wallet = $this->x_wallet->where('user_id', '=', $user->getKey())->where('type', '=', 'rial')->first();

        $boss = $this->x_user->where('type', '=', 'manager')->first();

        $boss_wallet = $this->x_wallet->where('user_id', '=', $boss->getKey())->where('type', '=', $request->wallet_name)->first();

        $boss_rial_wallet = $this->x_wallet->where('user_id', '=', $boss->getKey())->where('type', '=', 'rial')->first();


        if (min($boss_wallet->primary_cash, $boss_wallet->cash) < $request->amount){
            return \response('Not enough currency in Institute');
        }


        if (min($user_rial_wallet->primary_cash, $user_rial_wallet->cash) < $rial_amount){
            return \response('not enough money in your rial wallet');
        }

        $trans = $this->newTransaction($request->amount,  date ("Y-m-d H:i:s", time()), [$user->getKey(), $boss->getKey()]);


        $this->x_pay_transactions->create([
            'transaction_id' => $trans->getKey(),
            'fee' => 0,
            'type' => $request->wallet_name,
            'from' => $boss_wallet->getKey(),
            'to' => $requested_wallet->getKey(),
            'done' => true,
            'clerk_id' => null,
        ]);

        $boss_wallet->update([
            'primary_cash' => $boss_wallet->primary_cash - $request->amount,
            'cash' => $boss_wallet->cash - $request->amount,
        ]);



        $requested_wallet->update([
            'primary_cash' => $requested_wallet->primary_cash + $request->amount,
            'cash' => $requested_wallet->cash + $request->amount,
        ]);

        $trans = $this->newTransaction($request->amount,  date ("Y-m-d H:i:s", time()), [$boss->getKey(), $user->getKey()]);


        $this->x_pay_transactions->create([
            'transaction_id' => $trans->getKey(),
            'fee' => 0,
            'type' => 'rial',
            'to' => $boss_rial_wallet->getKey(),
            'from' => $user_rial_wallet->getKey(),
            'done' => true,
            'clerk_id' => null,
        ]);

        $boss_rial_wallet->update([
            'primary_cash' => $boss_rial_wallet->primary_cash + $rial_amount,
            'cash' => $boss_rial_wallet->cash + $rial_amount,
        ]);

        $user_rial_wallet->update([
            'primary_cash' => $user_rial_wallet->primary_cash - $rial_amount,
            'cash' => $user_rial_wallet->cash - $rial_amount,
        ]);

        return \response('done');


//        if ()




//        return \response($boss_wallet->primary_cash);

    }



    public function sell_currency(Request $request) {


        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $rial_amount = UserController::$EXCHANGE_SELL[$request->wallet_name] * (int)$request->amount;

        $requested_wallet = $this->x_wallet->where('user_id', '=', $user->getKey())->where('type', '=', $request->wallet_name)->first();

        $user_rial_wallet = $this->x_wallet->where('user_id', '=', $user->getKey())->where('type', '=', 'rial')->first();

        if (min($requested_wallet->cash, $requested_wallet->primary_cash) < $request->amount){
            return \response('not enough money in your requested wallet');
        }

        $boss = $this->x_user->where('type', '=', 'manager')->first();

        $boss_wallet = $this->x_wallet->where('user_id', '=', $boss->getKey())->where('type', '=', $request->wallet_name)->first();

        $boss_rial_wallet = $this->x_wallet->where('user_id', '=', $boss->getKey())->where('type', '=', 'rial')->first();

        if (min($boss_rial_wallet->cash, $boss_rial_wallet->primary_cash) < $rial_amount){
            return \response('not enough money in boss rial wallet');
        }

        $trans = $this->newTransaction($request->amount,  date ("Y-m-d H:i:s", time()), [$user->getKey(), $boss->getKey()]);


        $this->x_pay_transactions->create([
            'transaction_id' => $trans->getKey(),
            'fee' => 0,
            'type' => $request->wallet_name,
            'from' => $requested_wallet->getKey(),
            'to' => $boss_wallet->getKey(),
            'done' => true,
            'clerk_id' => null,
        ]);

        $boss_wallet->update([
            'primary_cash' => $boss_wallet->primary_cash + $request->amount,
            'cash' => $boss_wallet->cash + $request->amount,
        ]);



        $requested_wallet->update([
            'primary_cash' => $requested_wallet->primary_cash - $request->amount,
            'cash' => $requested_wallet->cash - $request->amount,
        ]);

        $trans = $this->newTransaction($request->amount,  date ("Y-m-d H:i:s", time()), [$boss->getKey(), $user->getKey()]);


        $this->x_pay_transactions->create([
            'transaction_id' => $trans->getKey(),
            'fee' => 0,
            'type' => 'rial',
            'to' => $user_rial_wallet->getKey(),
            'from' => $boss_rial_wallet->getKey(),
            'done' => true,
            'clerk_id' => null,
        ]);

        $boss_rial_wallet->update([
            'primary_cash' => $boss_rial_wallet->primary_cash - $rial_amount,
            'cash' => $boss_rial_wallet->cash - $rial_amount,
        ]);

        $user_rial_wallet->update([
            'primary_cash' => $user_rial_wallet->primary_cash + $rial_amount,
            'cash' => $user_rial_wallet->cash + $rial_amount,
        ]);

        return \response($boss->getKey());


//        if ()



    }

    private function get_user_transactions_from_table($table_name, $user, $all_transactions) {
        if (sizeof($user) > 0 )
            $t_user = $user->where('id', $user->id)->with(["x_transactions"])->first();
        else
            $t_user = $this->x_user->with(["x_transactions"])->first();



        $transactions = $t_user->x_transactions;


        $trans_id = [];

        foreach ($transactions as $trans) {
            array_push($trans_id, $trans->transaction_id);
        }

        $trans_id = $this->x_pay_transactions->whereIn("transaction_id", $trans_id)->get();

        $trans_id = $this->x_transaction->join($table_name, $table_name.'.transaction_id', '=', 'x_transactions.transaction_id')->get();

        foreach ($trans_id as $item) {
            $item->trans_type = $table_name;
        }


        $pay_transactions = $trans_id;

        foreach ($pay_transactions as $item) {
            array_push($all_transactions, $item);
        }

        return $all_transactions;

    }


    public function transactions(Request $request)
    {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null) {
            return \response("You need to login again", 401);
        }


//        dd(count($user));

        $all_transactions = [];

        if ($user->type == 'user') {
            $all_transactions = $this->get_user_transactions_from_table('x_pay_transactions', $user, $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_fee_transactions', $user, $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_exam_transactions', $user, $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_salary_transactions', $user, $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_exchange_transactions', $user, $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_charge_transactions', $user, $all_transactions);
        } elseif ($user->type == 'manager') {
            $all_transactions = $this->get_user_transactions_from_table('x_pay_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_fee_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_exam_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_salary_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_exchange_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_charge_transactions', [], $all_transactions);
        } else {
            $all_transactions = $this->get_user_transactions_from_table('x_pay_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_fee_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_exam_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_salary_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_exchange_transactions', [], $all_transactions);
            $all_transactions = $this->get_user_transactions_from_table('x_charge_transactions', [], $all_transactions);
        }


//        $data = [
//            'type' => $user->type,
//            'hyperLinks' => $this->fill_hyperLinks($user->type),
//            'wp_items' => $this->fill_wp_items($user->type),
//            'transactions' => $all_transactions
////            'fee' => (string)UserController::$APPLY_PAYMENT_FEE
//        ];

//        return view('new.transaction-history', ['x_data' => json_encode($all_transaction)]);

//        $json = json_encode($all_transactions[0]);
//
//        foreach ($json as $item) {
//            return view('new.transaction-history', ['x_data' => json_encode($item)]);
//        }

//        foreach ($all_transactions[0]->original as $k => $v) {
//            return view('new.transaction-history', ['x_data' => json_encode($k)]);
//
//        }
//        return view('new.transaction-history', ['x_data' => json_encode(->attributes)]);


        if (sizeof($all_transactions) == 0) {
            $data = [
                'type' => $user->type,
                'hyperLinks' => $this->fill_hyperLinks($user->type),
                'wp_items' => $this->fill_wp_items($user->type),
                'actions' => $this->fill_actions($user->type),
                'tables' => []
            ];

//        dd($data);
            return view('new.transaction-history', ['x_data' => json_encode($data)]);
        }

        $json = array_keys((array)json_decode(json_encode($all_transactions[0])));

        $table1 = [
            'ths' => [],
            'transactions' => [],
        ];


        $table2 = [
            'ths' => [],
            'transactions' => [],
        ];

        foreach ($json as $item) {
            array_push($table1['ths'], $item);
            array_push($table2['ths'], $item);
        }

        foreach ($all_transactions as $transaction) {
            $tans = ['tds' => []];

            foreach (json_decode(json_encode($transaction)) as $k => $v) {
                array_push($tans['tds'], ['class' => $k, 'value' => $v]);
            }

            if ($transaction->done == 0)
                array_push($table2['transactions'], $tans);
            else
                array_push($table1['transactions'], $tans);
        }
        $table1['id'] = 'checked-trans-table';
        $table2['id'] = 'unchecked-trans-table';



        $tables = [$table1, $table2];

        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'tables' => $tables
        ];

//        dd($data);
        return view('new.transaction-history', ['x_data' => json_encode($data)]);


    }

    public function acceptTrans(Request $request) {
//        dd($request);
        $user = $this->getUser($request);
//            dd($user->type);
        if ($user == null){
            return \response("You need to login again", 401);
        }

        $id = 0;

        $tds = $request->transaction['tds'];
        foreach ($tds as $td) {
            if ($td['class'] == 'transaction_id'){
                $id = $td['value'];
            }
        }

        if (sizeof($this->x_pay_transactions->where(['transaction_id' => $id])->get()) > 0) {
            $trans = $this->x_pay_transactions->where(['transaction_id' => $id])->update([
                'done' => true,
            ]);
        }


        if ($this->x_exam_transactions->where(['transaction_id' => $id])->get()) {
            $this->x_exam_transactions->where(['transaction_id' => $id])->update([
                'done' => true,
            ]);
        }

        $trans = $this->x_transaction->where(['transaction_id' => $id])->first();


        $from_wallet = $this->x_exam_transactions->where(['transaction_id' => $id])->first();
        $from_wallet = $this->x_wallet->where('address' , '=' , $from_wallet->getOriginal('from'))->first();



        $to_wallet = $this->x_exam_transactions->where(['transaction_id' => $id])->first();
        $to_wallet = $this->x_wallet->where('address' , '=' , $to_wallet->getOriginal('to'))->first();


        if ($request->accept) {




            $trans->update(['condition' => 'accept']);

            $from_wallet->update(['cash' => (integer)$from_wallet->getAttributes()['cash'] - (integer)$trans->getAttributes()['value']]);


            $to_wallet->update(['cash' => (integer)$from_wallet->getAttributes()['cash'] + (integer)$trans->getAttributes()['value']]);

        }else{

            $trans->update(['condition' => 'reject']);


            $from_wallet->update(['primary_cash' => (integer)$from_wallet->getAttributes()['primary_cash'] + (integer)$trans->getAttributes()['value']]);


            $to_wallet->update(['primary_cash' => (integer)$from_wallet->getAttributes()['primary_cash'] + (integer)$trans->getAttributes()['value']]);

        }

        return [$from_wallet->getAttributes(), $to_wallet->getAttributes()];

    }

    public function charge_credit(Request $request) {
//        dd($request);
        $user = $this->getUser($request);
//            dd($user->type);
        if ($user == null){
            return \response("You need to login again", 401);
        }

        $wallet = $this->x_wallet->where('user_id', '=', $user->getKey())->where('type', '=', 'rial')->first();

        $wallet->update([
            'cash' => (integer)$wallet->cash + (integer)$request->getContent()
        ]);

        $wallet->update([
            'primary_cash' => (integer)$wallet->primary_cash + (integer)$request->getContent()
        ]);


//        return \response($wallet->cash);
        return \response((integer)$request->getContent());

    }

    public function info(Request $request) {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'info' => [
                'national_id' => $user->national_id,
                'name' => $user->name,
                'family_name' => $user->family_name
                ]
//            'fee' => (string)UserController::$APPLY_PAYMENT_FEE
        ];
//        dd($data);

        return view('new.user-info', [
            'x_data' => json_encode($data)
        ]);


    }


    public function apply_payment(Request $request) {
//        dd($request);
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'fee' => (string)UserController::$APPLY_PAYMENT_FEE
        ];
//        dd($data);


        return view('new.apply-pay', [
            'x_data' => json_encode($data)
        ]);



    }

    public function internal_transaction(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'fee' => (string)UserController::$INTERNAL_TRANSACTION
        ];
//        dd($data);

        return view('new.int-trans', [
            'x_data' => json_encode($data)
        ]);

    }

    public function do_foreign_payment(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

//        dd($request);


        $wallet = $this->x_wallet->where('user_id', '=', $user->id)->where('type', '=', $request->type)->firstOrFail();

//        return $wallet->address;

        $price = (integer)($request->price)*( 1 + UserController::$APPLY_PAYMENT_FEE);

        if (min($wallet->cash, $wallet->primary_cash) < $price)
            return \response('not Enough money in your Wallet');        //TODO error page

        $wallet->update(['primary_cash' => (string)((integer)$wallet->primary_cash - $price)]);



        $trans = $this->newTransaction($price, date ("Y-m-d H:i:s", time()), [$user->id]);

        $app_trans = $this->x_pay_transactions->create([
            'transaction_id' => $trans->transaction_id,
            'from' => $wallet->address,
            'type' => $request->type,
            'done' => false,
            'clerk_id' => null,
            'fee' => $request->price * UserController::$APPLY_PAYMENT_FEE,
            'to' => $request->{'payee-id'}
        ]);

        $this->feePayment($request->price * UserController::$APPLY_PAYMENT_FEE, $user, $app_trans->getOriginal('transaction_id'), $wallet->address, $request->{'payee-id'});

        return \response('Payment was successful.');     //TODO or this kind of succeed we should make a page
//            dd($rial);
//            dd($request->exam);


    }


    public function do_apply_payment(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

//        dd($request);


        /*
         *
         */



        $wallet = $this->x_wallet->where('user_id', '=', $user->id)->where('type', '=', $request->type)->firstOrFail();

        $price = (integer)($request->price)*( 1 + UserController::$APPLY_PAYMENT_FEE);

        if (min($wallet->cash, $wallet->primary_cash )< $price)
            return \response('not Enough money in your Wallet');        //TODO error page

//        $wallet->update(['cash' => (string)((integer)$wallet->primary_cash - $price)]);


        $payee_wallet = $this->x_wallet->where('address', '=', $request->address)->where('type', '=', $request->type)->first();
        if (sizeof($payee_wallet) == 0) {
            return \response()->json([
                'user' => false
            ]);
        }

        $payee_wallet->update(['primary_cash' => (string)($request->price + (integer)$payee_wallet->primary_cash)]);


//        $trans = $this->newTransaction($price, date ("Y-m-d H:i:s", time()), [$user->id]);

//        $app_trans = $this->x_pay_transactions->create([
        $wallet->update(['primary_cash' => (string)((integer)$wallet->primary_cash) - $request->price*(1+UserController::$INTERNAL_TRANSACTION)]);
        //
//        $wallet->update(['primary_cash' => (string)((integer)$wallet->primary_cash - $price)]);
//
//
//
        $trans = $this->newTransaction($request->price, date ("Y-m-d H:i:s", time()), [$user->id, $payee_wallet->user_id]);
//      TODO  we have a problem here        both users are added to fee transaction !
        //        return $trans;
        //        return $wallet->getOriginal('address');
        $int_trans = $this->x_pay_transactions->create([
            'transaction_id' => $trans->transaction_id,
            'from' => $wallet->getOriginal('address'),
//            'from' => $wallet->address,
            'type' => $request->type,
            'done' => false,
            'clerk_id' => null,
//            'fee' => $request->price * UserController::$APPLY_PAYMENT_FEE,
//            'to' => $request->{'payee-id'}
            'fee' => $request->price * UserController::$INTERNAL_TRANSACTION,
            'to' => $payee_wallet->getOriginal('address')
        ]);

//        $this->feePayment($request->price * UserController::$APPLY_PAYMENT_FEE, $user);

        $this->feePayment($request->price * UserController::$INTERNAL_TRANSACTION, $user, $int_trans->getOriginal('transaction_id'), $wallet->getOriginal('address'), $payee_wallet->getOriginal('address'));

        return \response('Payment was successful.');     //TODO or this kind of succeed we should make a page
//            dd($rial);
//            dd($request->exam);


    }

    public function foreign_payment(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $data = [
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'wp_items' => $this->fill_wp_items($user->type),
            'actions' => $this->fill_actions($user->type),
            'fee' => (string)UserController::$APPLY_PAYMENT_FEE
        ];
//        dd($data);

        return view('new.apply-pay', [
            'x_data' => json_encode($data)
        ]);



    }

    public function do_internal_transaction(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

//        dd($request);

//        return $request->getContent();
//        return (integer)$request->price;

//        return $user->getOriginal('id');
        $wallet = $this->x_wallet->where('user_id', '=', $user->getOriginal('id'))->where('type', '=', $request->type)->firstOrFail();

//        return $wallet->getOriginal('cash');

//        return $wallet->getKey();

        $price = (integer)($request->price)*( 1 + UserController::$APPLY_PAYMENT_FEE);

//        return $wallet;
//        return min((integer)$wallet->getOriginal('cash'), (integer)$wallet->getOriginal('primary_cash') );

        if (min((integer)$wallet->cash, (integer)$wallet->primary_cash )< $price)
            return \response('not Enough money in your Wallet');        //TODO error page


        $payee_wallet = $this->x_wallet->where('address', '=', $request->address)->where('type', '=', $request->type)->first();

        if (sizeof($payee_wallet) == 0) {
            return \response('user');
        }

        $payee_wallet->update(['primary_cash' => (string)($request->price + (integer)$payee_wallet->primary_cash)]);


        $wallet->update(['primary_cash' => (string)((integer)$wallet->primary_cash) - $request->price*(1+UserController::$INTERNAL_TRANSACTION)]);


//
//        $wallet->update(['primary_cash' => (string)((integer)$wallet->primary_cash - $price)]);
//
//
//
        $trans = $this->newTransaction($request->price, date ("Y-m-d H:i:s", time()), [$user->id, $payee_wallet->user_id]);
//      TODO  we have a problem here        both users are added to fee transaction !

//        return $trans;

//        return $wallet->getOriginal('address');

        $int_trans = $this->x_pay_transactions->create([
            'transaction_id' => $trans->transaction_id,
            'from' => $wallet->getOriginal('address'),
            'type' => $request->type,
            'done' => false,
            'clerk_id' => null,
            'fee' => $request->price * UserController::$INTERNAL_TRANSACTION,
            'to' => $payee_wallet->getOriginal('address')
        ]);
//
        $this->feePayment($request->price * UserController::$INTERNAL_TRANSACTION, $user, $int_trans->getOriginal('transaction_id'), $wallet->getOriginal('address'), $payee_wallet->getOriginal('address'));
//
        return \response('done');     //TODO or this kind of succeed we should make a page
//            dd($rial);
//            dd($request->exam);


    }

    public function register_new_user(Request $request) {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $data = $request -> except(["wallet_type", "wallet_address", "repass"]);


        $data['password'] = md5($data['password']);
        $data['type'] = 'user';


//        dd($data);
//        return $data;
//        $this->makeBoss($data);

        $user = $this->x_user->create($data)->getKey();
//
//
//        $this->makeWallets($user);

        $arr = ["dollar", "euro", "rial"];
//        unset($arr[$request->wallet_type]);
//        unset($arr["rial"]);
        $arr = array_diff($arr, [$request->wallet_type]);
//        return $arr;
        foreach ( $arr as $t) {
            $wallet = new x_wallet();
            $wallet->user_id = $user;
            $wallet->address = str_random(24);
            $wallet->cash = '0';
            $wallet->primary_cash = '0';
            $wallet->type = $t;
            $wallet->save();
        }

        $wallet = new x_wallet();
        $wallet->user_id = $user;
        $wallet->address = $request->wallet_address;
        $wallet->cash = '0';
        $wallet->primary_cash = '0';
        $wallet->type = $request->wallet_type;
        $wallet->save();


        return \response($user);

    }

    public function change_information(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        //      TODO            handle report SMS Telegram Email


        $data = $request->getContent();

//        unset($data['repass']);
//        unset($data['avatar']);
//        unset($data['repass']);

//        unset($request)
//
        $user->update([
            'password' => md5($request->password),
            'email' => $request->email,
            'phonenumber' => $request->phonenumber
        ]);

        return \response($data);

    }

    private function fill_wp_items($type) {
        $wp_items=[];
        switch ($type) {
            case 'manager':
                $wp_items = [
                    [
                        'id' => 'exam-reg',
                        'link' => route('profile.exam-reg'),
                        'text' => 'Exam Registration'
                    ],
                    [
                        'id' => 'apply-pay',
                        'link' => route('profile.apply-pay'),
                        'text' => 'Application Payment'
                    ],
                    [
                        'id' => 'foreign-pay',
                        'link' => route('profile.foreign-pay'),
                        'text' => 'Foreign Payment'
                    ],
                    [
                        'id' => 'retr-mon',
                        'link' => route('profile.ret-mon'),
                        'text' => 'Retrieve Money'
                    ],
                    [
                        'id' => 'int-pay',
                        'link' => route('profile.int-trans'),
                        'text' => 'Internal Transaction'
                    ],
                    [
                        'id' => 'wallet',
                        'link' => route('profile'),
                        'text' => 'Wallets Page'
                    ]
                ];
                break;

            case 'user':
                $wp_items = [
                    [
                        'id' => 'exam-reg',
                        'link' => route('profile.exam-reg'),
                        'text' => 'Exam Registration'
                    ],
                    [
                        'id' => 'apply-pay',
                        'link' => route('profile.apply-pay'),
                        'text' => 'Application Payment'
                    ],
                    [
                        'id' => 'foreign-pay',
                        'link' => route('profile.foreign-pay'),
                        'text' => 'Foreign Payment'
                    ],
                    [
                        'id' => 'retr-mon',
                        'link' => route('profile.ret-mon'),
                        'text' => 'Retrieve Money'
                    ],
                    [
                        'id' => 'int-pay',
                        'link' => route('profile.int-trans'),
                        'text' => 'Internal Transaction'
                    ],
                    [
                        'id' => 'wallet',
                        'link' => route('profile'),
                        'text' => 'Wallets Page'
                    ]
                ];
                break;
            case "clerk":
                $wp_items = [
                    [
                        'id' => 'retr-mon',
                        'link' => route('profile.ret-mon'),
                        'text' => 'Retrieve Money'
                    ]
                ];
                break;
        }
        return $wp_items;
    }

    private function fill_actions($type){
        $actions = [
            [
                "id" => "logout",
                "link" => route('profile.logout'),
                "text" => "Logout"
            ]
        ];
        return $actions;
    }

    private function fill_hyperLinks($type) {
        $hyperLinks = [];
        switch ($type) {
            case "manager":
                $hyperLinks = [
                    [
                        "id" => "mainpage",
                        "link" => route('profile'),
                        "text" => "Main Page"
                    ],
                    [
                        "id" => "userinfo",
                        "link" => route("info"),
                        "text" => "User Information"
                    ],
                    [
                        "id" => "transactions",
                        "link" => route('transactions'),
                        "text" => "Transactions History"
                    ],
                    [
                        "id" => "users-table",
                        "link" => route('users-table'),
                        "text" => "Users Table"
                    ],
                    [
                        "id" => "clerks-table",
                        "link" => route('clerks-table'),
                        "text" => "Clerks Table"
                    ],
                    [
                        "id" => "clerk-messages",
                        "link" => route('boss.clerk-messages'),
                        "text" => "Clerk Messages"
                    ]
                ];
                break;

            case "user":
                $hyperLinks = [
                    [
                        "id" => "mainpage",
                        "link" => route('profile'),
                        "text" => "Main Page"
                    ],
                    [
                        "id" => "userinfo",
                        "link" => route("info"),
                        "text" => "User Information"
                    ],
                    [
                        "id" => "transactions",
                        "link" => route('transactions'),
                        "text" => "Transactions History"
                    ]
                ];
                break;
            case "clerk":
                $hyperLinks = [
                    [
                        "id" => "mainpage",
                        "link" => route('profile'),
                        "text" => "Main Page"
                    ],
                    [
                        "id" => "userinfo",
                        "link" => route("info"),
                        "text" => "User Information"
                    ],
                    [
                        "id" => "transactions",
                        "link" => route('transactions'),
                        "text" => "Transactions History"
                    ],
                    [
                        "id" => "users-table",
                        "link" => route('users-table'),
                        "text" => "Users Table"
                    ],
                    [
                        "id" => "clerks-table",
                        "link" => route('profile.show-clerk-send-message'),
                        "text" => "Send Message"
                    ]
                ];
                break;
        }
        return $hyperLinks;
    }

    public function boss_show_clerk_messages(Request $request) {
        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }

        if ($user->getAttributes()['type'] != 'manager')
            return \response()->redirectToRoute('profile');

        $messages = $this->x_message->get();


        $data = [
            'messages' => $messages,
            'type' => $user->type,
            'hyperLinks' => $this->fill_hyperLinks($user->type),
            'actions' => $this->fill_actions($user->type),
            'wp_items' => $this->fill_wp_items($user->type)
        ];

//        dd($data);

        return view('new.clerk-messages', ['x_data' => json_encode($data)]);


//        dd($messages);

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
            'actions' => $this->fill_actions($user->type),
            'wp_items' => $this->fill_wp_items($user->type)
        ];
//        dd($data);

        return view('new.exam-reg', [
            'x_data' => json_encode($data)
        ]);
    }

    private function feePayment($value,  $user, $related_id, $from, $to){

//        dd($related_id);

        $boss = $this->x_user->where('type', '=', 'manager')->firstOrFail();
        $trans = $this->newTransaction($value, date ("Y-m-d H:i:s", time()), [$user->id, $boss->id]);

//        dd($trans);
        $new_fee_trans = $this->x_fee_transactions->create([
            'transaction_id' => $trans->transaction_id,
            'from' =>  $from,
            'too' => $to,
            'related_transaction' => $related_id
        ]);

        return $new_fee_trans;

    }

    public function add_new_exam(Request $request) {

        $user = $this->getUser($request);
//            dd($user->type);

        if ($user == null){
            return \response("You need to login again", 401);
        }


        $new_exam = $request->new_exam;
        $new_exam['time'].=':00';
        $new_exam['date'].=' ';
        $new_exam['date'].=$new_exam['time'];


        $new_exam['exam_date'] = $new_exam['date'];
        unset($new_exam['time']);
        unset($new_exam['date']);

//        return $new_exam;

        $this->x_exams->create($new_exam);

        return \response('done');

    }

    private function newTransaction($value, $time, array $userID) {
        $trans = $this->x_transaction->create([
            'value' => $value,
            'calender' => $time
        ]);
//        dd($trans);
//        dd($trans->transaction_id);
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

            if ((integer)$exam->price + (integer)$exam->fee > min((integer)$rial->primary_cash, (integer)$rial->cash))
                return \response('not enough money for this exam. Please charge your Rial wallet'); // TODO for this kind of errors we should make a page
//                dd('not enough mouney !'. $exam->price. ' '. $rial->cash. ' '. $rial->user_id);
//            dd($rial);
            $rial->update([
                'primary_cash' => (string)((integer)$rial->primary_cash - (integer)$exam->price - (integer)$exam->fee)
            ]);

//            dd($rial);

            $trans = $this->newTransaction($exam->price, date ("Y-m-d H:i:s", time()), [$user->id]);
//            dd(UserController::$COMPANY_WALLET_ADDRESS);
//            dd(strtolower($exam->name));
//            dd($rial->getOriginal('address'));

//            dd(UserController::$COMPANY_WALLET_ADDRESS);

            $new_trans=$this->x_exam_transactions->create([
                'transaction_id' => $trans->transaction_id,
                'fee' => $exam->fee,
                'type' => $exam->name,
                'from' => $rial->getOriginal('address'),
                'to' => UserController::$COMPANY_WALLET_ADDRESS['rial'],
                'done' => false,
                'clerk_id' => null,
                'exam_id' => $exam->getOriginal('exam_id')
            ]);

            $this->feePayment($exam->fee, $user, $new_trans->getOriginal('transaction_id'), $rial->getOriginal('address'), UserController::$COMPANY_WALLET_ADDRESS['rial']);

            return \response('Exam bought successfully');     //TODO for this kind of succeed we should make a page
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
//            dd($user);

        if ($user == null){
            return \response("You need to login again", 401);
        }
        $id = $request->x_user_id;
        $sending_data = array();
        switch ($user->type) {
            case "user":
                $wallets = $this->x_wallet->select(['type', 'primary_cash', 'address'])
                    ->where('user_id', '=', $id)->get();
                $i = 1;
                foreach ($wallets as $wallet) {
                    array_push($sending_data,
                        [
                            'index' => $i,
                            'name' => (string)$wallet->type,            //TODO      should add address and other information
                            'amount' => (string)$wallet->primary_cash,
                            'address' => $wallet->getAttributes()['address']
                        ]);
                    $i++;
                }
                $wp_items = $this->fill_wp_items($user->type);
                $hyperLinks = $this->fill_hyperLinks($user->type);
                $actions = $this->fill_actions($user->type);
                $sending_data = [
                    'wallets' => $sending_data,
                    'type' => $user->type,
                    'wp_items' => $wp_items,
                    'hyperLinks' => $hyperLinks,
                    'actions' => $actions,
                ];
                $arr = array('x_data' => json_encode($sending_data));
                return view('new.default', $arr);
                break;
            case "clerk":

                return $this->transactions($request);


                break;
            case "manager":
                $wallets = $this->x_wallet->select(['type', 'primary_cash', 'address'])
                    ->where('user_id', '=', $id)->get();
                foreach ($wallets as $wallet) {
                    array_push($sending_data,
                        [
                            'name' => (string)$wallet->type,            //TODO      should add address and other information
                            'amount' => (string)$wallet->primary_cash,
                            'address' => $wallet->getAttributes()['address']
                        ]);
                }
                $wp_items = $this->fill_wp_items($user->type);
                $hyperLinks = $this->fill_hyperLinks($user->type);
                $actions = $this->fill_actions($user->type);
                $sending_data = [
                    'wallets' => $sending_data,
                    'type' => $user->type,
                    'wp_items' => $wp_items,
                    'hyperLinks' => $hyperLinks,
                    'actions' => $actions
                ];
                $arr = array('x_data' => json_encode($sending_data));
                return view('new.default', $arr);
                break;
        }
    }

    private function sendEmail($email, $title, $name, $elements){
        $data = array('name'=>$name, 'elements' => $elements);

        Mail::send('emails.mail', $data, function($message) use ($email, $title, $name) {
            $message->to($email , $name)
                ->subject($title);
            $message->from('smjfas@gmail.com','xCome');
        });

    }

}
