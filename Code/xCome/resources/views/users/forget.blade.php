@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/forget.js') }}"></script>

    {{--<form action="{{ url('/forget') }}" method="post">--}}
        {{--<input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>--}}
        {{--<input type="checkbox" name="vehicle" value="Car" checked> I have a car<br>--}}
        {{--<input type="submit" value="Submit">--}}
    {{--</form>--}}

{{--    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>--}}


    {{--<div>--}}
        {{--<h3>Fruits</h3>--}}
        {{--<label>--}}
            {{--<input type="checkbox" class="radio" value="1" name="fooby[1][]" />Kiwi</label>--}}
        {{--<label>--}}
            {{--<input type="checkbox" class="radio" value="1" name="fooby[1][]" />Jackfruit</label>--}}
        {{--<label>--}}
            {{--<input type="checkbox" class="radio" value="1" name="fooby[1][]" />Mango</label>--}}
    {{--</div>--}}
    {{--<div>--}}
        {{--<h3>Animals</h3>--}}
        {{--<label>--}}
            {{--<input type="checkbox" class="radio" value="1" name="fooby[2][]" />Tiger</label>--}}
        {{--<label>--}}
            {{--<input type="checkbox" class="radio" value="1" name="fooby[2][]" />Sloth</label>--}}
        {{--<label>--}}
            {{--<input type="checkbox" class="radio" value="1" name="fooby[2][]" />Cheetah</label>--}}
    {{--</div>--}}

    <input type="checkbox" class="slectOne" data-id="1 selected"/>
    <input type="checkbox" class="slectOne" data-id="2 selected"/>
    <input type="checkbox" class="slectOne" data-id="3 selected"/>

    <form action="{{ url('/forget') }}" method="post">
        <input type="number" id="phonenumber" name="phonenumber" placeholder="PhoneNumber"><br>
        <input type="email" id="email" name="email" placeholder="Email"><br>
        <input id="captcha" type="text" name="captcha" placeholder="captcha"><br>
        <input id="submit" type="submit" value="Submit">

    </form>
    {{--<span id="result"></span>--}}

    @if($check)
        <p id="inValid">input was wrong, please try again!</p>
    @endif
@stop


