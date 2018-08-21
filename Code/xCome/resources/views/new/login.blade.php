@extends('new.layouts.profile')

@section('workplace')

    <div id="app">
        <login v-bind:csrf_field ="'{{ csrf_token() }}'" v-bind:url="'{{ url('/login') }}'"></login>
    </div>

@stop


