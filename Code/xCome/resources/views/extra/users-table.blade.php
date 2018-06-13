@extends('layouts.'. $type.'.profile')

@section('workplace-div')
    <input id="search" name="searchbox" placeholder="Search here">
    <table id="users-table" cellpadding="10px" border="2px">
        <thead>
            <tr>
                <th>Name</th>
                <th>Family Name</th>
                <th>Username</th>
                <th>PID</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Condition</th>
                <th>Check</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="name">Name</td>
                <td class="family">Family name</td>
                <td class="username">Username</td>
                <td class="pid">PID</td>
                <td class="email">email</td>
                <td class="phonenumber">Phone number</td>
                <td class="condition">Active or Deactivate</td>
                <td class="checkbox"><input type="checkbox"></td>
            </tr>
            <tr>
                <td class="name">Name</td>
                <td class="family">Family name</td>
                <td class="username">Username</td>
                <td class="pid">PID</td>
                <td class="email">email</td>
                <td class="phonenumber">Phone number</td>
                <td class="condition">Active or De-active</td>
                <td class="checkbox"><input type="checkbox"></td>
            </tr>
        </tbody>
    </table>
    <button id="active-butt">Active Users</button>
    <button id="deactivate-butt">Deactivate Users</button>
    @stop