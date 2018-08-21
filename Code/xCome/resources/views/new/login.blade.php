@extends('new.layouts.profile')

@section('workplace-header')



    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}




    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>--}}


    <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login/jquery.min.js') }}"></script>
    <script src="{{ asset('js/login/mbd.min.js') }}"></script>
    <script src="{{ asset('js/login/popper.min.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">
    <style>
        @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);
        @import url(https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css);

        /*.hm-gradient {*/
        /*background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);*/
        /*}*/
        .darken-grey-text {
            color: #2E2E2E;
        }
        .danger-text {
            color: #ff3547; }
        .default-text {
            color: #2BBBAD;
        }
        .info-text {
            color: #33b5e5;
        }
        .form-white .md-form label {
            color: #fff;
        }
        .form-white input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #fff;
            -webkit-box-shadow: 0 1px 0 0 #fff;
            box-shadow: 0 1px 0 0 #fff;
        }
        .form-white input[type=text]:focus:not([readonly]) + label {
            color: #fff;
        }
        .form-white input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #fff;
            -webkit-box-shadow: 0 1px 0 0 #fff;
            box-shadow: 0 1px 0 0 #fff;
        }
        .form-white input[type=password]:focus:not([readonly]) + label {
            color: #fff;
        }
        .form-white input[type=password], .form-white input[type=text] {
            border-bottom: 1px solid #fff;
        }
        .form-white .form-control:focus {
            color: #fff;
        }
        .form-white .form-control {
            color: #fff;
        }
        .form-white textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #fff;
            box-shadow: 0 1px 0 0 #fff;
            color: #fff;
        }
        .form-white textarea.md-textarea  {
            border-bottom: 1px solid #fff;
            color: #fff;
        }
        .form-white textarea.md-textarea:focus:not([readonly])+label {
            color: #fff;
        }
        .hm-gradient{
            display: table;
            position: absolute;
            height: 100%;
            width: 100%;
        }
        .card-wrapper{
            display: table-cell;
            vertical-align: middle;
            horiz-align: center;
        }
        .card{
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            height: auto;
        }
    </style>

@stop


@section('workplace')



    <div id="app">
        <login v-bind:csrf_field ="'{{ csrf_token() }}'" v-bind:url="'{{ url('/login') }}'"></login>
    </div>



@stop


