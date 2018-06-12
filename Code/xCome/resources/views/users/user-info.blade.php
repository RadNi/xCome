@extends("layouts.profile")

@section("workplace")
    <form method="post" action="#">
        {{ csrf_field() }}
        <table id="user-info-table">
            <td >
                <input id="phonenumber" name="phonenumber" placeholder="Phone Number">
            </td>
            <td >
                <input id="pid" name="pid" placeholder="Person ID">
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
                <input id="name" name="name" placeholder="Name">
            </td>

            <td >
                <input id="family" name="family" placeholder="family">
            </td>

            <td >
                <input id="email" name="email" placeholder="email" type="email">
            </td>
        </table>
        <button id="change">Change</button>
    </form>
@stop