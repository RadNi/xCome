@extends('layouts.master')

@section('content')

    <form action={{ url("/contact") }} method="post" novalidate>
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="Email"><br>
        <input type="name" name="name" placeholder="Name"><br>
        <input type="name" name="familyName" placeholder="Family"><br>
        <input type="name" name="username" placeholder="Username"><br>
        <input type="text" name="captcha" placeholder="captcha"><br>
        <input type="submit" value="register">
    </form>

    @if($check == 3)
        <p id="notValidate">input was wrong, please try again!</p>
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


