@extends('layouts.master')

@section('content')

    <form action=" {{ url("/login") }}" method="post" novalidate>
        {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{ csrf_field() }}
        <input id="password" type="password" name="password" placeholder="password"><br>
        <input id="username" type="text" name="username" placeholder="Username"><br>
        <input id="captcha" type="text" name="captcha" placeholder="captcha"><br>
        <input id="login" type="submit" value="Login">
    </form>

    <button id="forget" onclick="location.href=' {{ url("/forget") }}' " type="button">
        forget password.</button>
    @if($check)
        <p id="inValid">input was wrong, please try again!</p>
    @endif
@stop


