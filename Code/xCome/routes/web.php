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

Route::get('/users-table', [
    "uses" => "UserController@getUsersTable",
    "as" => "clerk-users-table"
]);

Route::get('/users-table', [
    "uses" => "UserController@getUsersTable",
    "as" => "boss-users-table"
]);

Route::get('/boss/clerk-table', [
    "uses" => "UserController@getClerksTable",
    "as" => "clerk-table"
]);

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
        "uses" => "UserController@profile",
        "as" => "profile.apply-pay"
    ]);

    Route::any('for-pay', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" => "profile.for-pay"
    ]);

    Route::any('ret-mon', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" => "profile.ret-mon"
    ]);

    Route::any('int-trans', [
//        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
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
