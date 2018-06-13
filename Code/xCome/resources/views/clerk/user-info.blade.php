@extends("layouts.profile")

@section("workplace")
    <form method="post" action="#">
        {{ csrf_field() }}
        <table id="user-info-table">
            <td >
                <input id="phonenumber" name="phonenumber" placeholder="Phone Number">
            </td>
            <td >
                <p id="pid" name="pid">Person ID</p>
            </td>

            <td >
                <input id="avatar" name="avatar" placeholder="Avatar">
            </td>

            <td >
                <input id="password" type="password" name="password" placeholder="Password">
            </td>

            <td >
                <input id="ret-password" type="password" name="ret-password" placeholder="Repeat new password">
            </td>

            <td >
                <p id="name" name="name" >Name</p>
            </td>

            <td >
                <p id="family" name="family">Family Name</p>
            </td>

            <td >
                <input id="email" name="email" placeholder="email" type="email">
            </td>

            <td >
                <input id="wallet-addr"  name="wallet-address" placeholder="5458192738123912">
            </td>

        </table>
        <button id="change">Change</button>
    </form>
@stop