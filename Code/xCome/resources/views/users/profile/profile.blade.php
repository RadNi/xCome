<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>xCome</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="scroll-left">
        <table id="hyperlink-table" cellpadding="20">
            <td id="mainpage">
                <a href="{{ url("main") }}">Main Page</a>
            </td>
            <td id="userinfo">
                <a href="{{ url("userInfo") }}">User information</a>
            </td>
            <td id="transactions">
                <a href="{{ url("transactions") }}">Transaction History</a>
            </td>
        </table>
    </div>
    <div id="workplace">
        <div id="wp-navbar">
            <table id="wp-navbar-table">

                <td class="wp-item">
                    <button id="exam-reg" class="nav-butt" onclick="location.href = '{{ route("profile.exam-reg") }}'">Exam Registration</button>
                </td>

                <td class="wp-item">
                    <button id="apply-pay" class="nav-butt" onclick="location.href = '{{ route("profile.apply-pay") }}'">Apply Payment</button>
                </td>

                <td class="wp-item">
                    <button id="foreign-pay" class="nav-butt" onclick="location.href = '{{ route("profile.for-pay") }}'">Foreign Payment</button>
                </td>

                <td class="wp-item">
                    <button id="retr-mon" class="nav-butt" onclick="location.href = '{{ route("profile.ret-mon") }}'">Retrieve Money</button>
                </td>

                <td class="wp-item">
                    <button id="int-pay" class="nav-butt" onclick="location.href = '{{ route("profile.int-trans") }}'">Internal Transaction</button>
                </td>

                <td class="wp-item">
                    <button id="int-pay" class="nav-butt" onclick="location.href = '{{ route("profile.wallet") }}'" >Wallets</button>
                </td>

            </table>
        </div>
        @yield("workplace")
    </div>
</body>
</html>
