@extends('new.layouts.profile')

@section('workplace-header')



    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}




    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>--}}
    {{--new--}}
    {{--<script src="{{ asset('js/login/bootstrap.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/login/jquery.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/login/mbd.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/login/popper.min.js') }}"></script>--}}


    {{--<link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">--}}
    {{--<style>--}}
        {{--@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);--}}
        {{--@import url(https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css);--}}

        {{--/*.hm-gradient {*/--}}
        {{--/*background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);*/--}}
        {{--/*}*/--}}
        {{--.darken-grey-text {--}}
            {{--color: #2E2E2E;--}}
        {{--}--}}
        {{--.danger-text {--}}
            {{--color: #ff3547; }--}}
        {{--.default-text {--}}
            {{--color: #2BBBAD;--}}
        {{--}--}}
        {{--.info-text {--}}
            {{--color: #33b5e5;--}}
        {{--}--}}
        {{--.form-white .md-form label {--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white input[type=text]:focus:not([readonly]) {--}}
            {{--border-bottom: 1px solid #fff;--}}
            {{---webkit-box-shadow: 0 1px 0 0 #fff;--}}
            {{--box-shadow: 0 1px 0 0 #fff;--}}
        {{--}--}}
        {{--.form-white input[type=text]:focus:not([readonly]) + label {--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white input[type=password]:focus:not([readonly]) {--}}
            {{--border-bottom: 1px solid #fff;--}}
            {{---webkit-box-shadow: 0 1px 0 0 #fff;--}}
            {{--box-shadow: 0 1px 0 0 #fff;--}}
        {{--}--}}
        {{--.form-white input[type=password]:focus:not([readonly]) + label {--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white input[type=password], .form-white input[type=text] {--}}
            {{--border-bottom: 1px solid #fff;--}}
        {{--}--}}
        {{--.form-white .form-control:focus {--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white .form-control {--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white textarea.md-textarea:focus:not([readonly]) {--}}
            {{--border-bottom: 1px solid #fff;--}}
            {{--box-shadow: 0 1px 0 0 #fff;--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white textarea.md-textarea  {--}}
            {{--border-bottom: 1px solid #fff;--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.form-white textarea.md-textarea:focus:not([readonly])+label {--}}
            {{--color: #fff;--}}
        {{--}--}}
        {{--.hm-gradient{--}}
            {{--display: table;--}}
            {{--position: absolute;--}}
            {{--height: 100%;--}}
            {{--width: 100%;--}}
        {{--}--}}
        {{--.card-wrapper{--}}
            {{--display: table-cell;--}}
            {{--vertical-align: middle;--}}
            {{--horiz-align: center;--}}
        {{--}--}}
        {{--.card{--}}
            {{--margin-left: auto;--}}
            {{--margin-right: auto;--}}
            {{--width: 40%;--}}
            {{--height: auto;--}}
        {{--}--}}
    {{--</style>--}}

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login/jquery.min.js') }}"></script>

    <!------ Include the above in your HEAD tag ---------->

    <!-- All the files that are required -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <style>
        /*------------------------------------------------------------------
    [Master Stylesheet]

    Project    	: Aether
    Version		: 1.0
    Last change	: 2015/03/27
    -------------------------------------------------------------------*/
        /*------------------------------------------------------------------
        [Table of contents]

        1. General Structure
        2. Anchor Link
        3. Text Outside the Box
        4. Main Form
        5. Login Button
        6. Form Invalid
        7. Form - Main Message
        8. Custom Checkbox & Radio
        9. Misc
        -------------------------------------------------------------------*/
        /*=== 1. General Structure ===*/
        html,
        body {
            background: #efefef;
            padding: 10px;
            font-family: 'Varela Round';
        }
        /*=== 2. Anchor Link ===*/
        a {
            color: #aaaaaa;
            transition: all ease-in-out 200ms;
        }
        a:hover {
            color: #333333;
            text-decoration: none;
        }
        /*=== 3. Text Outside the Box ===*/
        .etc-login-form {
            color: #919191;
            padding: 10px 20px;
        }
        .etc-login-form p {
            margin-bottom: 5px;
        }
        /*=== 4. Main Form ===*/
        .login-form-1 {
            max-width: 300px;
            border-radius: 5px;
            display: inline-block;
        }
        .main-login-form {
            position: relative;
        }
        .login-form-1 .form-control {
            border: 0;
            box-shadow: 0 0 0;
            border-radius: 0;
            background: transparent;
            color: #555555;
            padding: 7px 0;
            font-weight: bold;
            height:auto;
        }
        .login-form-1 .form-control::-webkit-input-placeholder {
            color: #999999;
        }
        .login-form-1 .form-control:-moz-placeholder,
        .login-form-1 .form-control::-moz-placeholder,
        .login-form-1 .form-control:-ms-input-placeholder {
            color: #999999;
        }
        .login-form-1 .form-group {
            margin-bottom: 0;
            border-bottom: 2px solid #efefef;
            padding-right: 20px;
            position: relative;
        }
        .login-form-1 .form-group:last-child {
            border-bottom: 0;
        }
        .login-group {
            background: #ffffff;
            color: #999999;
            border-radius: 8px;
            padding: 10px 20px;
        }
        .login-group-checkbox {
            padding: 5px 0;
        }
        /*=== 5. Login Button ===*/
        .login-form-1 .login-button {
            position: absolute;
            right: -25px;
            top: 50%;
            background: #ffffff;
            color: #999999;
            padding: 11px 0;
            width: 50px;
            height: 50px;
            margin-top: -25px;
            border: 5px solid #efefef;
            border-radius: 50%;
            transition: all ease-in-out 500ms;
        }
        .login-form-1 .login-button:hover {
            color: #555555;
            transform: rotate(450deg);
        }
        .login-form-1 .login-button.clicked {
            color: #555555;
        }
        .login-form-1 .login-button.clicked:hover {
            transform: none;
        }
        .login-form-1 .login-button.clicked.success {
            color: #2ecc71;
        }
        .login-form-1 .login-button.clicked.error {
            color: #e74c3c;
        }
        /*=== 6. Form Invalid ===*/
        label.form-invalid {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 5;
            display: block;
            margin-top: -25px;
            padding: 7px 9px;
            background: #777777;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
            font-size: 11px;
        }
        label.form-invalid:after {
            top: 100%;
            right: 10px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: transparent;
            border-top-color: #777777;
            border-width: 6px;
        }
        /*=== 7. Form - Main Message ===*/
        .login-form-main-message {
            background: #ffffff;
            color: #999999;
            border-left: 3px solid transparent;
            border-radius: 3px;
            margin-bottom: 8px;
            font-weight: bold;
            height: 0;
            padding: 0 20px 0 17px;
            opacity: 0;
            transition: all ease-in-out 200ms;
        }
        .login-form-main-message.show {
            height: auto;
            opacity: 1;
            padding: 10px 20px 10px 17px;
        }
        .login-form-main-message.success {
            border-left-color: #2ecc71;
        }
        .login-form-main-message.error {
            border-left-color: #e74c3c;
        }
        /*=== 8. Custom Checkbox & Radio ===*/
        /* Base for label styling */
        [type="checkbox"]:not(:checked),
        [type="checkbox"]:checked,
        [type="radio"]:not(:checked),
        [type="radio"]:checked {
            position: absolute;
            left: -9999px;
        }
        [type="checkbox"]:not(:checked) + label,
        [type="checkbox"]:checked + label,
        [type="radio"]:not(:checked) + label,
        [type="radio"]:checked + label {
            position: relative;
            padding-left: 25px;
            padding-top: 1px;
            cursor: pointer;
        }
        /* checkbox aspect */
        [type="checkbox"]:not(:checked) + label:before,
        [type="checkbox"]:checked + label:before,
        [type="radio"]:not(:checked) + label:before,
        [type="radio"]:checked + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 2px;
            width: 17px;
            height: 17px;
            border: 0px solid #aaa;
            background: #f0f0f0;
            border-radius: 3px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3);
        }
        /* checked mark aspect */
        [type="checkbox"]:not(:checked) + label:after,
        [type="checkbox"]:checked + label:after,
        [type="radio"]:not(:checked) + label:after,
        [type="radio"]:checked + label:after {
            position: absolute;
            color: #555555;
            transition: all .2s;
        }
        /* checked mark aspect changes */
        [type="checkbox"]:not(:checked) + label:after,
        [type="radio"]:not(:checked) + label:after {
            opacity: 0;
            transform: scale(0);
        }
        [type="checkbox"]:checked + label:after,
        [type="radio"]:checked + label:after {
            opacity: 1;
            transform: scale(1);
        }
        /* disabled checkbox */
        [type="checkbox"]:disabled:not(:checked) + label:before,
        [type="checkbox"]:disabled:checked + label:before,
        [type="radio"]:disabled:not(:checked) + label:before,
        [type="radio"]:disabled:checked + label:before {
            box-shadow: none;
            border-color: #8c8c8c;
            background-color: #878787;
        }
        [type="checkbox"]:disabled:checked + label:after,
        [type="radio"]:disabled:checked + label:after {
            color: #555555;
        }
        [type="checkbox"]:disabled + label,
        [type="radio"]:disabled + label {
            color: #8c8c8c;
        }
        /* accessibility */
        [type="checkbox"]:checked:focus + label:before,
        [type="checkbox"]:not(:checked):focus + label:before,
        [type="checkbox"]:checked:focus + label:before,
        [type="checkbox"]:not(:checked):focus + label:before {
            border: 1px dotted #f6f6f6;
        }
        /* hover style just for information */
        label:hover:before {
            border: 1px solid #f6f6f6 !important;
        }
        /*=== Customization ===*/
        /* radio aspect */
        [type="checkbox"]:not(:checked) + label:before,
        [type="checkbox"]:checked + label:before {
            border-radius: 3px;
        }
        [type="radio"]:not(:checked) + label:before,
        [type="radio"]:checked + label:before {
            border-radius: 35px;
        }
        /* selected mark aspect */
        [type="checkbox"]:not(:checked) + label:after,
        [type="checkbox"]:checked + label:after {
            content: '✔';
            top: 0;
            left: 2px;
            font-size: 14px;
        }
        [type="radio"]:not(:checked) + label:after,
        [type="radio"]:checked + label:after {
            content: '\2022';
            top: 0;
            left: 3px;
            font-size: 30px;
            line-height: 25px;
        }
        /*=== 9. Misc ===*/
        .logo {
            padding: 15px 0;
            font-size: 25px;
            color: #aaaaaa;
            font-weight: bold;
        }

    </style>

@stop


@section('workplace')



    <div id="app">
        <login v-bind:csrf_field ="'{{ csrf_token() }}'" v-bind:url="'{{ url('/login') }}'"></login>
    </div>



@stop

