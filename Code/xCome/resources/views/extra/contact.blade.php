@extends('layouts.master')

@section('content')

    <form action={{ url("/contact") }} method="post" novalidate>
        {{ csrf_field() }}
        <input id="email" type="email" name="email" placeholder="Email"><br>
        <input id="name" type="name" name="name" placeholder="Name"><br>
        <input id="family" type="name" name="familyName" placeholder="Family"><br>
        <input id="username" type="name" name="username" placeholder="Username"><br>
        {{--<input id="captcha" type="text" name="captcha" placeholder="captcha"><br>--}}
        <input id="message" type="text" name="message" placeholder="Type your message here">
        <input id="cellphone" type="text" name="message" placeholder="Phone Number">
        <input id="submit" type="submit" value="register">
    </form>

    @if($check == 3)
        <p id="inValid">input was wrong, please try again!</p>
    @elseif($check == 2)
        <p id="response">thanks for your Submission <3</p>
    @endif

    <table style="width:100%">
        <tr>
            <th>Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Postal Address</th>
        </tr>
        <tr>
            <td>our Number</td>
            <td>our Email</td>
            <td>our Address</td>
            <td>our Postal Address</td>
        </tr>
    </table>
@stop


