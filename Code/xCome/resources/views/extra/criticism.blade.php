@extends('layouts.master')

@section('content')

    <form action=# method="post" novalidate>
        {{ csrf_field() }}
        <input id="email" type="email" name="email" placeholder="Email"><br>
        <input id="name" type="name" name="name" placeholder="Name"><br>
        <input id="family" type="name" name="familyName" placeholder="Family"><br>
        <input id="message"  name="messageTopic" placeholder="Question Topic">
        <input id="message"  name="messageBody" placeholder="Question Body">
        <input id="captcha"  name="captcha" placeholder="captcha"><br>
        <input id="phonenumber" type="text" name="message" placeholder="Phone Number">
        <input id="submit" type="submit" value="register">
    </form>

    @if($check == 2)
        <p id="inValid">input was wrong, please try again!</p>
    @elseif($check == 3)
        <p id="response">thanks for your Submission <3</p>
    @endif

    <div id="questions" style="width:100%">
        <div class="question">
            <div class="question-topic">Question #1 topic</div>
            <div class="question-body">Question #1 body</div>
        </div>
        <div class="question">
            <div class="question-topic">Question #2 topic</div>
            <div class="question-body">Question #2 body</div>
        </div>
        <div class="question">
            <div class="question-topic">Question #3 topic</div>
            <div class="question-body">Question #3 body</div>
        </div>
    </div>
@stop


