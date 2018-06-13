@extends('layouts.'. $type.'.profile')

@section('workplace-div')
    <div id="add-clerk">

        <button id="addShow" onclick="popupAdd.hidden = false;addShow.hidden = true;">Add new clerk</button>

        <div id="popupAdd" hidden>
            <h4>new Clerk Informations</h4>
            <input id="email" type="email" name="email" placeholder="Email"><br>
            <input id="password" type="password" name="password" placeholder="Password"><br>
            <input id="repass" type="password" name="retryPass" placeholder="Repeat Password"><br>
            <input id="name" type="name" name="name" placeholder="Name"><br>
            <input id="family" type="name" name="familyName" placeholder="Family"><br>
            <input id="username" type="name" name="username" placeholder="Username"><br>
            {{--<input id="" type="age" name="age" placeholder="age"><br>--}}
            <input id="address" type="address" name="address" placeholder="address"><br>
            <input id="captcha" type="text" name="captcha" placeholder="captcha"><br>
            <input id="person_id" type="text" name="PersonID" placeholder="Person ID"><br>
            <input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number"><br>
            <button id="add" data-dismiss="modal">Add</button>
        </div>

    </div>
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
                <th>Bank Account Number</th>
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
                <td class="bank-account">Bank account Number</td>
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
                <td class="bank-account">Bank account Number</td>
                <td class="checkbox"><input type="checkbox"></td>
            </tr>
        </tbody>
    </table>
    <button id="active-butt">Active Clerks</button>
    <button id="deactivate-butt">Deactivate Clerks</button>
    <button id="remove-butt">Delete Clerks</button>
    @stop