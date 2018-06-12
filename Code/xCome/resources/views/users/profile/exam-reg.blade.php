@extends('layouts.navbar-profile')

@section('workplace')
    <div id="wp-wallets">
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


