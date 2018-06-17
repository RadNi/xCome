@extends('layouts.boss.profile')

@section('workplace')
    <div id="clerk-messages-table">
        <table id="messages-table" border="1px" cellpadding="2px">
            <thead>
            <tr>
                <th>Message</th>
                <th>Clerk ID</th>
                <th>Clerk Name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="message">Message number 1</td>
                <td class="clerk-id">Clerk ID</td>
                <td class="clerk-name">Clerk Name</td>
            </tr>
            <tr>
                <td class="message">Message number 2</td>
                <td class="clerk-id">Clerk ID</td>
                <td class="clerk-name">Clerk Name</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
