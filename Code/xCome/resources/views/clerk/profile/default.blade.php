@extends('layouts.clerk.profile')

@section('workplace-div')
    <div id="wp-trans-table">
        <input id="search" name="searchbox" placeholder="Search here">

        <table id="checked-trans-table" cellpadding="6px" border="2px">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Condition</th>
                    <th>Currency Type</th>
                    <th>Clerk ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Calender</th>
                    <th>Value</th>
                    <th>Transaction ID</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="type">Type (real value)</td>
                    <td class="condition">Condition (Apply or Reject)</td>
                    <td class="currency">Currency (real value)</td>
                    <td class="clerk-id">Clerk ID</td>
                    <td class="from">From (real value)</td>
                    <td class="to">To (real value)</td>
                    <td class="calender">Calende (real value)</td>
                    <td class="value">Valu (real value)</td>
                    <td class="transaction-id">Transaction ID (real value)</td>
                </tr>
                <tr>
                    <td class="type">Type (real value)</td>
                    <td class="condition">Condition (Apply or Reject)</td>
                    <td class="currency">Currency (real value)</td>
                    <td class="clerk-id">Clerk ID</td>
                    <td class="from">From (real value)</td>
                    <td class="to">To (real value)</td>
                    <td class="calender">Calende (real value)</td>
                    <td class="value">Valu (real value)</td>
                    <td class="transaction-id">Transaction ID (real value)</td>
                </tr>
            </tbody>
        </table>

        <table id="unchecked-trans-table" cellpadding="6px" border="2px">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Currency Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Calender</th>
                    <th>Value</th>
                    <th>Transaction ID</th>
                    <th>Mark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="type">Type (real value)</td>
                    <td class="currency">Currency (real value)</td>
                    <td class="from">From (real value)</td>
                    <td class="to">To (real value)</td>
                    <td class="calender">Calende (real value)</td>
                    <td class="value">Value (real value)</td>
                    <td class="transaction-id">Transaction ID (real value)</td>
                    <td class="mark"><input type="checkbox"></td>
                </tr>
                <tr>
                    <td class="type">Type (real value)</td>
                    <td class="currency">Currency (real value)</td>
                    <td class="from">From (real value)</td>
                    <td class="to">To (real value)</td>
                    <td class="calender">Calende (real value)</td>
                    <td class="value">Value (real value)</td>
                    <td class="transaction-id">Transaction ID (real value)</td>
                    <td class="mark"><input type="checkbox"></td>
                </tr>
            </tbody>
        </table>
        <button id="reject-but">Reject</button>
        <button id="accept-but">Accept</button>
    </div>
@stop


