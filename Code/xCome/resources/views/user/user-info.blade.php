@extends("layouts.user.profile")

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
                <div id="reportMethod">
                    Choose Report method:<br>
                    SMS <input id="smsReport" class="report" name="sms" type="checkbox">
                    Telegram <input id="tgReport" class="report" name="tg"  type="checkbox">
                    Email <input id="emailReport" class="report" name="email" type="checkbox">
                </div>
            </td>
        </table>
        <button id="change">Change</button>
    </form>
@stop