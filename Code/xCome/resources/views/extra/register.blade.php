@extends('layouts.master')

@section('content')
    <form action={{ url("/register") }} method="post" novalidate>
        {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{ csrf_field() }}
        <input id="email" type="email" name="email" placeholder="Email"><br>
        <input id="password" type="password" name="password" placeholder="Password"><br>
        <input id="repass" type="password" name="password_confirmation" placeholder="Repeat Password"><br>
        <input id="name" type="name" name="name" placeholder="Name"><br>
        <input id="family" type="name" name="familyName" placeholder="Family"><br>
        <input id="username" type="name" name="username" placeholder="Username"><br>
        {{--<input id="" type="age" name="age" placeholder="age"><br>--}}
        <input id="address" type="address" name="address" placeholder="address"><br>
        {{--<input id="captcha" type="text" name="captcha" placeholder="captcha"><br>--}}
        <input id="person_id" type="text" name="PersonID" placeholder="Person ID"><br>
        <input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number"><br>
        <input id="submit" type="submit" value="register">

    </form>

    @if($check)
        <p id="inValid">input was wrong, please try again!</p>
    @endif
@stop


