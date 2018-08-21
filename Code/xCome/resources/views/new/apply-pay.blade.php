@extends('new.profile')

@section('workplace-div')

    <apply_payment v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">

    </apply_payment>


@stop
@section('scroll-left')
    <scroll_left v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">

    </scroll_left>
@stop

@section('navbar')
    <navbar v-bind:x_data="{{ $x_data }}" v-bind:csrf_field="'{{ csrf_token() }}'">

    </navbar>
@stop


