@extends('layouts.master')

@section('content')
    {{--<form action={{ url("/register") }} method="post" novalidate>--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input id="email" type="email" name="email" placeholder="Email"><br>--}}
        {{--<input id="password" type="password" name="password" placeholder="Password"><br>--}}
        {{--<input id="repass" type="password" name="password_confirmation" placeholder="Repeat Password"><br>--}}
        {{--<input id="name" type="name" name="name" placeholder="Name"><br>--}}
        {{--<input id="family" type="name" name="familyName" placeholder="Family"><br>--}}
        {{--<input id="username" type="name" name="username" placeholder="Username"><br>--}}
        {{--<input id="" type="age" name="age" placeholder="age"><br>--}}
        {{--<input id="address" type="address" name="address" placeholder="address"><br>--}}
        {{--<input id="captcha" type="text" name="captcha" placeholder="captcha"><br>--}}
        {{--<input id="person_id" type="text" name="PersonID" placeholder="Person ID"><br>--}}
        {{--<input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number"><br>--}}
        {{--<input id="submit" type="submit" value="register">--}}

    {{--</form>--}}
    <div class="text-center" style="padding:50px 0">
        <div class="logo">register</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left" action={{ url("/register") }} method="post" novalidate>
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>

                        <div class="form-group">
                            <label for="repass" class="sr-only">Password Confirmation</label>
                            <input type="password" class="form-control" id="repass" name="password_confirmation" placeholder="Password Confirmation">
                        </div>
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="family" class="sr-only">Family Name</label>
                            <input type="text" class="form-control" id="family" name="familyName" placeholder="Family Name">
                        </div>
                        <div class="form-group">
                            <label for="address" class="sr-only">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="person_id" class="sr-only">National ID</label>
                            <input type="text" class="form-control" id="person_id" name="national_id" placeholder="National ID">
                        </div>
                        <div class="form-group">
                            <label for="cellphone" class="sr-only">Phone Number</label>
                            <input type="text" class="form-control" id="cellphone" name="CellPhone" placeholder="Phone Number">
                        </div>

                        <div class="form-group login-group-checkbox">
                            <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                            <label for="reg_agree">i agree with <a href="/terms">terms</a></label>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="/login">login here</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>


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


