@extends('new.layouts.profile')


@section('scroll-left')

    {{--<table id="hyperlink-table" cellpadding="20">--}}
        {{--<td id="mainpage">--}}
            {{--<a href="{{ route($type.'.profile') }}">Main Page</a>--}}
        {{--</td>--}}
        {{--<td id="userinfo">--}}
            {{--<a href="{{ route($type.".info") }}">User information</a>--}}
        {{--</td>--}}
        {{--<td id="transactions">--}}
            {{--<a href="{{ route($type.".transactions") }}">Transaction History</a>--}}
        {{--</td>--}}
    {{--</table>--}}
@stop
@section('navbar')
    {{--<table id="wp-navbar-table">--}}

        {{--<td class="wp-item">--}}
            {{--<button id="exam-reg" class="nav-butt" onclick="location.href = '{{ route("user.profile.exam-reg") }}'">Exam Registration</button>--}}
        {{--</td>--}}

        {{--<td class="wp-item">--}}
            {{--<button id="apply-pay" class="nav-butt" onclick="location.href = '{{ route("user.profile.apply-pay") }}'">Apply Payment</button>--}}
        {{--</td>--}}

        {{--<td class="wp-item">--}}
            {{--<button id="foreign-pay" class="nav-butt" onclick="location.href = '{{ route("user.profile.for-pay") }}'">Foreign Payment</button>--}}
        {{--</td>--}}

        {{--<td class="wp-item">--}}
            {{--<button id="retr-mon" class="nav-butt" onclick="location.href = '{{ route("user.profile.ret-mon") }}'">Retrieve Money</button>--}}
        {{--</td>--}}

        {{--<td class="wp-item">--}}
            {{--<button id="int-pay" class="nav-butt" onclick="location.href = '{{ route("user.profile.int-trans") }}'">Internal Transaction</button>--}}
        {{--</td>--}}

        {{--<td class="wp-item">--}}
            {{--<button id="wallet" class="nav-butt" onclick="location.href = '{{ route("user.profile.wallet") }}'" >Wallets</button>--}}
        {{--</td>--}}

    {{--</table>--}}
@stop

@section('workplace')

    <account_div v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'"></account_div>
    <div id="workplace-div">
        @yield('workplace-div')
    </div>
@stop