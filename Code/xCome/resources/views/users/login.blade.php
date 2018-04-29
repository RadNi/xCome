@extends('layouts.master')

@section('content')

@if(count($errors))
<ul>
    @foreach($errors -> all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@foreach ($students as $student)
<h5><a href={{route("student.show" ,['id' => $student->id])}}>{{ $student->name }}</a></h5>
@endforeach
@if($students -> nextPageUrl())
<a href={{ $students -> nextPageUrl() }}> Next Page </a>
@endif
<br>
@if($students -> previousPageUrl())
<a href={{ $students -> previousPageUrl() }}> Prev Page </a>
@endif
<hr>
<form action="" method="post" novalidate>
    {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{ csrf_field() }}
    <input id="email" type="email" name="email" placeholder="email"><br>
    <input id="password" type="password" name="password" placeholder="password"><br>
    <input id="" type="name" name="name" placeholder="name"><br>
    <input id="" type="age" name="age" placeholder="age"><br>
    <input id="" type="address" name="address" placeholder="address"><br>
    <input id="" type="submit" value="register">

</form>
@stop


