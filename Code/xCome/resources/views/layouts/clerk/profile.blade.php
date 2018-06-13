@extends('layouts.profile')


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
        <td id="transactions">
            <a href="{{ route("users-table") }}">Users Table</a>
        </td>
    </table>
@endsection

@section('workplace')
    <div id="workplace">
    @yield('workplace-div')
    </div>
@endsection
