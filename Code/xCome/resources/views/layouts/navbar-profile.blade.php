@extends('layouts.profile')

@section('navbar')
    <table id="wp-navbar-table">

        <td class="wp-item">
            <button id="exam-reg" class="nav-butt" onclick="location.href = '{{ route("profile.exam-reg") }}'">Exam Registration</button>
        </td>

        <td class="wp-item">
            <button id="apply-pay" class="nav-butt" onclick="location.href = '{{ route("profile.apply-pay") }}'">Apply Payment</button>
        </td>

        <td class="wp-item">
            <button id="foreign-pay" class="nav-butt" onclick="location.href = '{{ route("profile.for-pay") }}'">Foreign Payment</button>
        </td>

        <td class="wp-item">
            <button id="retr-mon" class="nav-butt" onclick="location.href = '{{ route("profile.ret-mon") }}'">Retrieve Money</button>
        </td>

        <td class="wp-item">
            <button id="int-pay" class="nav-butt" onclick="location.href = '{{ route("profile.int-trans") }}'">Internal Transaction</button>
        </td>

        <td class="wp-item">
            <button id="wallet" class="nav-butt" onclick="location.href = '{{ route("profile.wallet") }}'" >Wallets</button>
        </td>

    </table>
@stop

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
    @yield('workplace-div')
@stop
