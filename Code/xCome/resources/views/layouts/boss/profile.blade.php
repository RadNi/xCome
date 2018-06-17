@extends('layouts.profile')

@section('navbar')
    <table id="wp-navbar-table">

        <td class="wp-item">
            <button id="exam-reg" class="nav-butt" onclick="location.href = '{{ route("boss.profile.exam-reg") }}'">Exam Registration</button>
        </td>

    </table>
@stop


@section('scroll-left')
    <table id="hyperlink-table" cellpadding="20">
        <td id="mainpage">
            <a href="{{ route($type.'.profile') }}">Main Page</a>
        </td>
        <td id="userinfo">
            <a href="{{ route($type.".info") }}">User information</a>
        </td>
        <td id="transactions">
            <a href="{{ route($type.".transactions") }}">Transaction History</a>
        </td>
        <td id="users-table">
            <a href="{{ route($type."-users-table") }}">Users Table</a>
        </td>
        <td id="clerk-table">
            <a href="{{ route("clerk-table") }}">Clerks Table</a>
        </td>
        <td id="contact-us">
            <a href="{{ route("boss.contact-us") }}">Contact Us</a>
        </td>
        <td id="clerk-message">
            <a href="{{ route("boss.clerk-messages") }}">Clerk Messages</a>
        </td>
    </table>
@endsection

@section('workplace')
    <div id="account-div">
        <p>current credit is: </p>
        <p id="credit"></p>
        <button id="charge" onclick="popup.hidden = false">Charge</button>
        <div id="popup" hidden>
            <h4>Write amount you need</h4>
            <input id="amount" type="number" placeholder="Toman">
            <button id="buy" data-dismiss="modal">Buy</button>
        </div>
    </div>
    <div id="workplace-div">
    @yield('workplace-div')
    </div>
@endsection
