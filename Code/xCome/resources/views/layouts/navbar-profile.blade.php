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
            <button id="int-pay" class="nav-butt" onclick="location.href = '{{ route("profile.wallet") }}'" >Wallets</button>
        </td>

    </table>
@stop

@section('workplace')
    @yield('workplace')
@stop
