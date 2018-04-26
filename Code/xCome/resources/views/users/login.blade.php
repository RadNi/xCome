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
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="name" name="name" placeholder="name"><br>
    <input type="age" name="age" placeholder="age"><br>
    <input type="address" name="address" placeholder="address"><br>
    <input type="submit" value="register">

</form>
@stop


