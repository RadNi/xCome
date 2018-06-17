@extends('layouts.'. $type.'.profile')

@section('workplace-div')
    <div id="popupQuestion" hidden>
        answer Question Number ...
        <input id="answer" placeholder="answer">
        <input type="submit" onclick="popupQuestion.hidden = true" placeholder="Submit">
    </div>
    <table id="all-contact" cellpadding="2px" border="2px">
        <thead>
            <tr>
                <th>Question Number</th>
                <th>Email</th>
                <th>Name</th>
                <th>Family</th>
                <th>Username</th>
                <th>Message</th>
                <th>Cellphone</th>
            </tr>
        </thead>
        <tbody>
            <tr class="question">
                <td>1</td>
                <td>email</td>
                <td>name</td>
                <td>family</td>
                <td>username</td>
                <td>message</td>
                <td>cellphone</td>
            </tr>
            <tr class="question">
                <td class="question-number">2</td>
                <td class="email">email</td>
                <td class="name">name</td>
                <td class="family">family</td>
                <td class="username">username</td>
                <td class="message">message</td>
                <td class="cellphone">cellphone</td>
            </tr>
        </tbody>
    </table>
    <script>
        var el = document.getElementsByClassName("question");
        Array.prototype.forEach.call(el, function (e) {
            e.onclick = function () {
                popupQuestion.hidden = false;
//                popupQuestion.innerHTML = "answer Question Number" + e.getElementsByClassName('question-number')[0].innerHTML
            }
        })
    </script>
    @stop