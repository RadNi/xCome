@extends('layouts.master')

@section('content')
    <form action={{ url("/register") }} method="post" novalidate>
        {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="retryPass" placeholder="Repeat Password"><br>
        <input type="name" name="name" placeholder="Name"><br>
        <input type="name" name="familyName" placeholder="Family"><br>
        <input type="name" name="username" placeholder="Username"><br>
        <input type="age" name="age" placeholder="age"><br>
        <input type="address" name="address" placeholder="address"><br>
        <input type="text" name="captcha" placeholder="captcha"><br>
        <input type="text" name="PersonID" placeholder="Person ID"><br>
        <input type="submit" value="register">

    </form>

    @if($check)
        <p id="notValidate">input was wrong, please try again!</p>
    @endif
@stop


