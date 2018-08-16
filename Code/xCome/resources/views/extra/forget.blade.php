@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/forget.js') }}"></script>




    <form action="{{ url('/forget') }}" method="post">
        {{ csrf_field()}}
        <input type="radio" class="slectOne" name="type[]" id="telegram-check"/>
        <input type="radio" class="slectOne" name="type[]" id="email-check"/>
        <input type="radio" class="slectOne" name="type[]" id="sms-check"/> <br>
        <input type="number" id="phone-number" name="phoneNumber" placeholder="PhoneNumber"><br>
        <input type="email" id="email" name="email" placeholder="Email"><br>
        {{--<input id="captcha" type="text" name="captcha" placeholder="captcha"><br>--}}
        <input id="submit" type="submit" value="Submit">

    </form>

    @if($check)
        <p id="inValid">input was wrong, please try again!</p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop


