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
    <div>
        <div id="wp-navbar">
            <table id="wp-navbar-table">

                <td>
                    <button id="exam-reg" >Exam Registration</button>
                </td>

                <td>
                    <button id="apply-pay" >Apply Payment</button>
                </td>

                <td>
                    <button id="foreign-pay" >Foreign Payment</button>
                </td>

                <td>
                    <button id="retr-mon" >Retrieve Money</button>
                </td>

                <td>
                    <button id="int-pay" >Internal Anonymous Transaction</button>
                </td>

            </table>
        </div>
        <div id="wp-wallets">
            <table id="wallets-table">
                <td>
                    <div class="wallets">
                        <p class="wallet-name">Sapphire</p>
                        <p class="rel-price"></p>
                        <p class="diagram"></p>
                        <p class="redirection"></p>
                    </div>
                </td>
                <td>
                    <div class="wallets">
                        <p class="wallet-name">Riall</p>
                        <p class="wallet-name">Sapphire</p>
                        <p class="rel-price"></p>
                        <p class="diagram"></p>
                        <p class="redirection"></p>
                    </div>
                </td>
                <td>
                    <div class="wallets">
                        <p class="wallet-name">Dollar</p>
                        <p class="wallet-name">Sapphire</p>
                        <p class="rel-price"></p>
                        <p class="diagram"></p>
                        <p class="redirection"></p>
                    </div>
                </td>
                <td>
                    <div class="wallets">
                        <p class="wallet-name">Euro</p>
                        <p class="wallet-name">Sapphire</p>
                        <p class="rel-price"></p>
                        <p class="diagram"></p>
                        <p class="redirection"></p>
                    </div>
                </td>
            </table>
        </div>
    </div>
</body>
</html>
