@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/forget.js') }}"></script>


    <input type="checkbox" class="slectOne" id="telegram-check"/>
    <input type="checkbox" class="slectOne" id="email-check"/>
    <input type="checkbox" class="slectOne" id="sms-check"/>

    <form action="{{ url('/forget') }}" method="post">
        <input type="number" id="phone-number" name="phonenumber" placeholder="PhoneNumber"><br>
        <input type="email" id="email" name="email" placeholder="Email"><br>
        <input id="captcha" type="text" name="captcha" placeholder="captcha"><br>
        <input id="submit" type="submit" value="Submit">

    </form>

    @if($check)
        <p id="inValid">input was wrong, please try again!</p>
    @endif
@stop


