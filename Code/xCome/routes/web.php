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



Route::get('/register', [
    "uses" => "UserController@showRegister",
    "as" => "User.showRegister"
]);

Route::post('/register', [
    "uses" => "UserController@checkRegister",
    "as" => "User.checkRegister"
]);

Route::get('/login', [
    "uses" => "UserController@showLogin",
    "as" => "User.showLogin"
]);

Route::post('/login', [
    "uses" => "UserController@checkLogin",
    "as" => "User.checkLogin"
]);

Route::get('/forget', [
    "uses" => "UserController@showForget",
    "as" => "User.showForget"
]);

Route::get('/contact', [
    "uses" => "MainController@showContact",
    "as" => "Main.showContact"
]);

Route::get('/profile/wallet', [
    "uses" => "UserController@profile",
    "as" => "User.profile"
]);


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('profile')->group(function () {

    Route::get('exam-reg', [
        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" =>"profile.exam-reg"
    ] );
    Route::get('wallet', [
        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" =>"profile.wallet"
    ] );

    Route::any('apply-pay', [
        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" =>"profile.apply-pay"
    ] );

    Route::any('for-pay', [
        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" =>"profile.for-pay"
    ] );

    Route::any('ret-mon', [
        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
        "as" =>"profile.ret-mon"
    ] );

        Route::any('int-trans', [
        "middleware" => "App\Http\Middleware\ProfileMiddleWare",
        "uses" => "UserController@profile",
            "as" =>"profile.int-trans"
    ] );
});