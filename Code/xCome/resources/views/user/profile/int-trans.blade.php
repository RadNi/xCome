@extends('layouts.user.profile')


@section('workplace-div')
    <div id="wp-int-trans">
        <form method="post" action="{{ route("user.profile.int-trans") }}">
            {{ csrf_field() }}
            <input id="payee-id" name="payee-id" placeholder="Payee wallet address" type="number">
            <input id="price" name="price" placeholder="price" type="number">
            <input id="type" name="type" placeholder="Transaction Type">
            <p id="fee">fee for this transaction</p>
            <input id="submit" name="submit" type="submit">
        </form>
    </div>
@stop