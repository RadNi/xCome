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
    <div id="wp-navbar">
        @yield("navbar")
    </div>
    <div id="scroll-left">
        <table id="hyperlink-table" cellpadding="20">
            <td id="mainpage">
                <a href="{{ route("profile") }}">Main Page</a>
            </td>
            <td id="userinfo">
                <a href="{{ route("User.info") }}">User information</a>
            </td>
            <td id="transactions">
                <a href="{{ route("User.transactions") }}">Transaction History</a>
            </td>
        </table>
    </div>
    <div id="workplace">

        @yield("workplace")
    </div>
</body>
</html>
