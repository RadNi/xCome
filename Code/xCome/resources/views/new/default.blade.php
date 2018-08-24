@extends('new.profile')

@section('workplace-div')

        <wallets v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">

        </wallets>


@stop
{{--@section('scroll-left')--}}
    {{--<scroll_left v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">--}}

    {{--</scroll_left>--}}
{{--@stop--}}

@section('navbar')
    <navbar v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">

    </navbar>
@stop


