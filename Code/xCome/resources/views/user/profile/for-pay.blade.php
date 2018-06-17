@extends('layouts.user.profile')



@section('workplace-div')
    <div id="wp-for-pay">
        <form method="post" action="{{ route("user.profile.for-pay") }}">
            {{ csrf_field() }}
            <input id="payee-id" name="payee-id" placeholder="Payee credit card" type="number">
            <input id="type" name="type" placeholder="type">
            <input id="price" name="price" placeholder="price" type="number">$
            <p id="fee">fee for this transaction</p>
            <input id="submit" name="submit" type="submit">
        </form>
    </div>
@stop


