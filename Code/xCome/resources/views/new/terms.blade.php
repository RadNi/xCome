@extends('layouts.master')

@section('content')

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

@stop