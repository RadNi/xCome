@extends('layouts.navbar-profile')

@section('workplace')
    <input id="search" name="searchbox" placeholder="Search here">
    <table id="transactions-table" cellpadding="10px">
        <thead>
        <tr>
            <th>Type</th>
            <th>Currency Type</th>
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
            <td class="currency">Currency (real value)</td>
            <td class="from">From (real value)</td>
            <td class="to">To (real value)</td>
            <td class="calender">Calende (real value)</td>
            <td class="valu">Valu (real value)</td>
            <td class="transaction-id">Transaction ID (real value)</td>
        </tr>
        <tr>
            <td class="type">Type (real value)</td>
            <td class="currency">Currency (real value)</td>
            <td class="from">From (real value)</td>
            <td class="to">To (real value)</td>
            <td class="calender">Calende (real value)</td>
            <td class="valu">Valu (real value)</td>
            <td class="transaction-id">Transaction ID (real value)</td>
        </tr>
        </tbody>
    </table>
@stop
