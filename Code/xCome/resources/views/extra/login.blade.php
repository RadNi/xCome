@extends('layouts.master')

@section('content')

    <div id="app">
        <login v-bind:csrf_field ="'{{ csrf_token() }}'" v-bind:url="'{{ url('/login') }}'"></login>
    </div>

    <script src="js/app.js"></script>
@stop


