@extends('layouts.master')

@section('content')
    <div class="container">
        <p>
            Every one who use our service should be a real person.
        </p>
        <p>
            We never share your personal data such as your Telephone or Email.
        </p>
        <p>
            For using Telegram Bot you should follow these steps:
            <li>Press start at @xCome_bot</li>
            <li>Go to user Information page and select using telegram</li>
            <li>An activation token will be sent to your Telegram account</li>
            <li>Rewrite token to our web app</li>
            <li>An activation success message will be sent to your telegram account</li>
        </p>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col">
                        Type
                    </th>
                    <th class="col">
                        Fee
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Internal Transaction</td>
                    <td>20%</td>
                </tr>
                <tr>
                    <td>Apply payment</td>
                    <td>32%</td>
                </tr>
                <tr>
                    <td>Foreign Payment</td>
                    <td>32%</td>
                </tr>
                </tr>
                <tr>
                    <td>Retreive Money</td>
                    <td>32%</td>
                </tr>
                <tr>
                    <td>Exam Registeration</td>
                    <td>Depends on type of exam.</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
@stop