@extends('layouts.clerk.profile')

@section('workplace')
    <div id="wp-ret-mon">
        <form method="post" action="{{ route("clerk.profile.ret-mon") }}">
            {{ csrf_field() }}
            <input id="payee-id" name="payee-id" placeholder="Payee credit card" type="number">
            <input id="price" name="price" placeholder="price" type="number">$
            <p id="fee">fee for this transaction</p>
            <input id="submit" name="submit" type="submit">
        </form>
    </div>
@stop


