@extends('users.profile.profile')

@section('workplace')
    <div id="wp-apply-pay">
        <form method="post" action="{{ route("profile.apply-pay") }}">
            {{ csrf_field() }}
            <input id="payee-id" name="payee-id" placeholder="Payee credit card" type="number">
            <input id="prirce" name="price" placeholder="price" type="number">
            <input id="type" name="type" placeholder="Transaction Type">
            <p id="fee">fee for this transaction</p>
            <input id="submit" name="submit" type="submit">
        </form>
    </div>
@stop


