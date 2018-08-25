<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/login', [
//    "uses" => "UserController@showLogin",
//    "as" => "User.showLogin"
//]);
//
//Route::post('/login', [
//    "uses" => "UserController@checkLogin",
//    "as" => "User.checkLogin"
//]);


//Route::get('/test', 'testValidation@testshow');
//
//Route::post('/test', [
//    'uses' => 'testValidation@test',
//    'middleware' => 'validator:App\Http\Controllers\testValidation'
//])->name('testRoute');


Route::get('/register', [
    "uses" => "UserController@showRegister",
    "as" => "User.showRegister"
]);

//Route::get('/users-table', [
//    "uses" => "UserController@getUsersTable",
//    "as" => "clerk-users-table"
//]);

//Route::get('/clerks-table', [
//    "uses" => "UserController@getUsersTable",
//    "as" => "clerks-table"
//]);

//Route::get('/users-table', [
//    "uses" => "UserController@getUsersTable",
//    "as" => "boss-users-table"
//]);

//Route::get('/boss/clerk-table', [
//    "uses" => "UserController@getClerksTable",
//    "as" => "clerk-table"
//]);

Route::post('/register', [
    "uses" => "UserController@checkRegister",
    "as" => "User.checkRegister",
    "middleware" => 'validator:App\Http\Controllers\register_verifier',
]);

Route::get('/login', [
    "uses" => "UserController@showLogin",
    "as" => "User.showLogin"
]);

Route::post('/login', [
    "uses" => "UserController@checkLogin",
    "as" => "User.checkLogin",
    "middleware" => 'validator:App\Http\Controllers\login_verifier',
]);

Route::get('/forget', [
    "uses" => "UserController@showForget",
    "as" => "User.showForget"
]);

Route::post('/forget', [
    "uses" => "UserController@checkForget",
    "as" => "User.checkForget",
    "middleware" => 'validator:App\Http\Controllers\forget_verifier',
]);

Route::get('/contact', [
    "uses" => "MainController@showContact",
    "as" => "Main.showContact"
]);

Route::any('/criticism', [
    "uses" => "MainController@criticism",
    "as" => "Main.criticism"
]);



Route::get('/transactions', [
    "uses" => "UserController@transactions",
    "as" =>"transactions"
] );

Route::any('/information', [
    "uses" => "UserController@info",
    "as" =>"info"
] );

Route::any('/send-message', [
    "uses" => "UserController@sendMessage",
    "as" =>"send-message"
] );

Route::any('/contact', [
    "uses" => "MainController@allContact",
    "as" =>"contact-us",
    "middleware" => 'validator:App\Http\Controllers\contact_us_verifier',
] );

Route::any('/messages', [
    "uses" => "UserController@showMessages",
    "as" =>"clerk-messages"
] );


Route::prefix('profile') -> group(function () {

    Route::any('/', [
//            "middleware" => "App\Http\Middleware\\XCookie",
        "uses" => "UserController@profile",
        "as" => "profile"
    ]);

    Route::any('change-info', [
        "uses" => "UserController@change_information",
        "as" => "profile.change-info"
    ]);

    Route::any('register-new-user', [
       "uses" => "UserController@register_new_user",
       "as" => "profile.reg-new-user"
    ]);

    Route::any('exam-reg', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@exam_reg",
        "as" => "profile.exam-reg"
    ]);
    Route::any('wallet', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" => "profile.wallet"
    ]);

    Route::any('apply-pay', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@apply_payment",
        "as" => "profile.apply-pay"
    ]);

    Route::any('charge-credit', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@charge_credit",
        "as" => "profile.charge-credit"
    ]);

    Route::any('sell-currency', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@sell_currency",
        "as" => "profile.sell_currency"
    ]);

    Route::any('logout', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@logout",
        "as" => "profile.logout"
    ]);

    Route::any('add-new-exam', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@add_new_exam",
        "as" => "profile.add_new_exam"
    ]);

    Route::any('buy-currency', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@buy_currency",
        "as" => "profile.buy_currency"
    ]);

    Route::any('do-apply-pay', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@do_apply_payment",
        "as" => "profile.do-apply-pay"
    ]);

    Route::any('do-foreign-pay', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@do_foreign_payment",
        "as" => "profile.do-foreign-pay"
    ]);

    Route::any('do-int-trans', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@do_internal_transaction",
        "as" => "profile.do-int-trans"
    ]);

    Route::any('foreign-pay', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@foreign_payment",
        "as" => "profile.foreign-pay"
    ]);

    Route::any('users-table', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@getUsersTable",
        "as" => "users-table"
    ]);

    Route::any('clerks-table', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@getClerksTable",
        "as" => "clerks-table"
    ]);

    Route::any('active-user', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@active_user",
        "as" => "active-user"
    ]);


    Route::any('ret-mon', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@foreign_payment",
        "as" => "profile.ret-mon"
    ]);

    Route::any('int-trans', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@internal_transaction",
        "as" => "profile.int-trans"
    ]);

    Route::any('buy-exam', [
       "uses" => "UserController@buyExam",
       "as" => "profile.buy-exam"
    ]);

});


//Route::prefix('user') -> group(function () {
//    Route::get('transactions', [
//        "uses" => "UserController@transactions",
//        "as" =>"user.transactions"
//    ] );
//
//    Route::any('information', [
//        "uses" => "UserController@info",
//        "as" =>"user.info"
//    ] );
//
//    Route::prefix('profile') -> group(function () {
//
//        Route::get('/', [
////            "middleware" => "App\Http\Middleware\\XCookie",
//            "uses" => "UserController@profile",
//            "as" => "user.profile"
//        ]);
//
//        Route::get('exam-reg', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "user.profile.exam-reg"
//        ]);
//        Route::get('wallet', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "user.profile.wallet"
//        ]);
//
//        Route::any('apply-pay', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "user.profile.apply-pay"
//        ]);
//
//        Route::any('for-pay', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "user.profile.for-pay"
//        ]);
//
//        Route::any('ret-mon', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "user.profile.ret-mon"
//        ]);
//
//        Route::any('int-trans', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "user.profile.int-trans"
//        ]);
//    });
//
//});
//
//Route::prefix('clerk') -> group(function () {
//    Route::get('transactions', [
//        "uses" => "UserController@transactions",
//        "as" =>"clerk.transactions"
//    ] );
//
//    Route::any('information', [
//        "uses" => "UserController@info",
//        "as" =>"clerk.info"
//    ] );
//
//    Route::any('send-message', [
//        "uses" => "UserController@sendMessage",
//        "as" =>"clerk.send-message"
//    ] );
//
//    Route::prefix('profile') -> group(function () {
//
//        Route::get('/', [
//            "uses" => "UserController@profile",
//            "as" => "clerk.profile"
//        ]);
//
//        Route::any('ret-mon', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "clerk.profile.ret-mon"
//        ]);
//    });
//
//});
//
//Route::prefix('boss') -> group(function () {
//    Route::get('transactions', [
//        "uses" => "UserController@transactions",
//        "as" =>"boss.transactions"
//    ] );
//
//    Route::any('information', [
//        "uses" => "UserController@info",
//        "as" =>"boss.info"
//    ] );
//
//    Route::any('contact', [
//        "uses" => "MainController@allContact",
//        "as" =>"boss.contact-us",
//        "middleware" => 'validator:App\Http\Controllers\contact_us_verifier',
//    ] );
//
//    Route::any('messages', [
//        "uses" => "UserController@showMessages",
//        "as" =>"boss.clerk-messages"
//    ] );
//
//
//    Route::prefix('profile') -> group(function () {
//
//        Route::get('/', [
//            "uses" => "UserController@profile",
//            "as" => "boss.profile"
//        ]);
//
//        Route::get('exam-reg', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "boss.profile.exam-reg"
//        ]);
//        Route::get('wallet', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "boss.profile.wallet"
//        ]);
//
//        Route::any('apply-pay', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "boss.profile.apply-pay"
//        ]);
//
//        Route::any('for-pay', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "boss.profile.for-pay"
//        ]);
//
//        Route::any('ret-mon', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "boss.profile.ret-mon"
//        ]);
//
//        Route::any('int-trans', [
//            "middleware" => "App\Http\Middleware\ProfileMiddleWare",
//            "uses" => "UserController@profile",
//            "as" => "boss.profile.int-trans"
//        ]);
//    });
//
//});


Route::get('/', function () {
    return view('welcome');
});
