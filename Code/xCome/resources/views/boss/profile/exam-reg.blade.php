@extends('layouts.boss.profile')

@section('workplace-div')
    <div id="wp-exam-reg">
        <div id="add-exam">

            <button id="addExam" onclick="popupAddExam.hidden = false;addExam.hidden = true;">Add new exam</button>

            <div id="popupAddExam" hidden>
                <h4>new Exam Informations</h4>
                <input id="exam-type" type="name" name="name" placeholder="Name"><br>
                <input id="exam-price" type="number" name="price" placeholder="Price"><br>
                <input id="exam-fee" type="number" name="fee" placeholder="Fee"><br>
                <input id="exam-date" type="date" name="date" placeholder="Date"><br>
                <button id="add" data-dismiss="modal">Add</button>
            </div>

        </div>
        <table id="exams-table">
            <td>
                <div id="exam1" class="exam">
                    <p class="exam-type">GRE</p>
                    <p class="exam-price">812</p>
                    <p class="exam-fee">20</p>
                    <p class="exam-date">date</p>
                    <button id="buy-butt">Buy</button>
                </div>
            </td>
            <td>
                <div id="exam2" class="exam">
                    <p class="exam-type">TOFEL</p>
                    <p class="exam-price">421</p>
                    <p class="exam-fee">20</p>
                    <p class="exam-date">date</p>
                    <button id="buy-butt">Buy</button>
                </div>
            </td>
            <td>
                <div id="exam3" class="exam">
                    <p class="exam-type">IELTS</p>
                    <p class="exam-price">312</p>
                    <p class="exam-fee">20</p>
                    <p class="exam-date">date</p>
                    <button id="buy-butt">Buy</button>
                </div>
            </td>
        </table>
    </div>
@stop


