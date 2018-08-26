<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>xCome</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/exchanger.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/numeral.min.js') }}"></script>

    {{--Dont find navbar header so inserted three line here--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>--}}
    {{--<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @yield("navbar-header")
{{--    @yield("scroll-left-header")--}}
    @yield("workplace-header")


</head>
<body>
    <div id="app">
            <div id="wp-navbar">
                @yield("navbar")
            </div>
        {{--<div id="scroll-left">--}}
            {{--@yield('scroll-left')--}}
        {{--</div>--}}
            <div id="workplace">
                @yield('workplace')
            </div>
    </div>

    <div class="row">
        <div class="input-group" id="footer">
            <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" name="CURR_FR_VAL" id="CURR_FR_VAL" placeholder="Convert #">
            <select class="custom-select" id="CURR_FR">
                <option selected>Choose...</option>
                <option value="EUR">EUR</option>
                <option value="IRR">IRR</option>
                <option value="USD" selected="">USD</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">To</label>
            <select class="custom-select" id="CURR_TO">
                <option selected>Choose...</option>
                <option value="EUR">EUR</option>
                <option value="IRR" selected="">IRR</option>
                <option value="USD" >USD</option>
            </select>
            <button class="btn btn-outline-secondary" type="button" id="convert" onclick="getCurrencyUsingJQuery()">Convert</button>
            <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" name="CURR_FR_VAL" id="CURR_VAL" readonly="" placeholder="Press Convert">
        </div>
    </div>

    {{--<div id="footer">--}}
        {{--<div id="exchanger">--}}
            {{--<input type="text" value="1" name="CURR_FR_VAL" id="CURR_FR_VAL" placeholder="Enter amount">--}}
            {{--<select id="CURR_FR" class="postfix">--}}

                {{--<option value="AED">AED</option>--}}

                {{--<option value="AFN">AFN</option>--}}

                {{--<option value="ALL">ALL</option>--}}

                {{--<option value="AMD">AMD</option>--}}

                {{--<option value="ANG">ANG</option>--}}

                {{--<option value="AOA">AOA</option>--}}

                {{--<option value="ARS">ARS</option>--}}

                {{--<option value="AUD">AUD</option>--}}

                {{--<option value="AWG">AWG</option>--}}

                {{--<option value="AZN">AZN</option>--}}

                {{--<option value="BAM">BAM</option>--}}

                {{--<option value="BBD">BBD</option>--}}

                {{--<option value="BDT">BDT</option>--}}

                {{--<option value="BGN">BGN</option>--}}

                {{--<option value="BHD">BHD</option>--}}

                {{--<option value="BIF">BIF</option>--}}

                {{--<option value="BND">BND</option>--}}

                {{--<option value="BOB">BOB</option>--}}

                {{--<option value="BRL">BRL</option>--}}

                {{--<option value="BSD">BSD</option>--}}

                {{--<option value="BTC">BTC</option>--}}

                {{--<option value="BTN">BTN</option>--}}

                {{--<option value="BWP">BWP</option>--}}

                {{--<option value="BYN">BYN</option>--}}

                {{--<option value="BYR">BYR</option>--}}

                {{--<option value="BZD">BZD</option>--}}

                {{--<option value="CAD">CAD</option>--}}

                {{--<option value="CDF">CDF</option>--}}

                {{--<option value="CHF">CHF</option>--}}

                {{--<option value="CLP">CLP</option>--}}

                {{--<option value="CNY">CNY</option>--}}

                {{--<option value="COP">COP</option>--}}

                {{--<option value="CRC">CRC</option>--}}

                {{--<option value="CUP">CUP</option>--}}

                {{--<option value="CVE">CVE</option>--}}

                {{--<option value="CZK">CZK</option>--}}

                {{--<option value="DJF">DJF</option>--}}

                {{--<option value="DKK">DKK</option>--}}

                {{--<option value="DOP">DOP</option>--}}

                {{--<option value="DZD">DZD</option>--}}

                {{--<option value="EGP">EGP</option>--}}

                {{--<option value="ERN">ERN</option>--}}

                {{--<option value="ETB">ETB</option>--}}

                {{--<option value="EUR">EUR</option>--}}

                {{--<option value="FJD">FJD</option>--}}

                {{--<option value="FKP">FKP</option>--}}

                {{--<option value="GBP">GBP</option>--}}

                {{--<option value="GEL">GEL</option>--}}

                {{--<option value="GHS">GHS</option>--}}

                {{--<option value="GIP">GIP</option>--}}

                {{--<option value="GMD">GMD</option>--}}

                {{--<option value="GNF">GNF</option>--}}

                {{--<option value="GTQ">GTQ</option>--}}

                {{--<option value="GYD">GYD</option>--}}

                {{--<option value="HKD">HKD</option>--}}

                {{--<option value="HNL">HNL</option>--}}

                {{--<option value="HRK">HRK</option>--}}

                {{--<option value="HTG">HTG</option>--}}

                {{--<option value="HUF">HUF</option>--}}

                {{--<option value="IDR">IDR</option>--}}

                {{--<option value="ILS">ILS</option>--}}

                {{--<option value="INR">INR</option>--}}

                {{--<option value="IQD">IQD</option>--}}

                {{--<option value="IRR">IRR</option>--}}

                {{--<option value="ISK">ISK</option>--}}

                {{--<option value="JMD">JMD</option>--}}

                {{--<option value="JOD">JOD</option>--}}

                {{--<option value="JPY">JPY</option>--}}

                {{--<option value="KES">KES</option>--}}

                {{--<option value="KGS">KGS</option>--}}

                {{--<option value="KHR">KHR</option>--}}

                {{--<option value="KMF">KMF</option>--}}

                {{--<option value="KPW">KPW</option>--}}

                {{--<option value="KRW">KRW</option>--}}

                {{--<option value="KWD">KWD</option>--}}

                {{--<option value="KYD">KYD</option>--}}

                {{--<option value="KZT">KZT</option>--}}

                {{--<option value="LAK">LAK</option>--}}

                {{--<option value="LBP">LBP</option>--}}

                {{--<option value="LKR">LKR</option>--}}

                {{--<option value="LRD">LRD</option>--}}

                {{--<option value="LSL">LSL</option>--}}

                {{--<option value="LVL">LVL</option>--}}

                {{--<option value="LYD">LYD</option>--}}

                {{--<option value="MAD">MAD</option>--}}

                {{--<option value="MDL">MDL</option>--}}

                {{--<option value="MGA">MGA</option>--}}

                {{--<option value="MKD">MKD</option>--}}

                {{--<option value="MMK">MMK</option>--}}

                {{--<option value="MNT">MNT</option>--}}

                {{--<option value="MOP">MOP</option>--}}

                {{--<option value="MRO">MRO</option>--}}

                {{--<option value="MUR">MUR</option>--}}

                {{--<option value="MVR">MVR</option>--}}

                {{--<option value="MWK">MWK</option>--}}

                {{--<option value="MXN">MXN</option>--}}

                {{--<option value="MYR">MYR</option>--}}

                {{--<option value="MZN">MZN</option>--}}

                {{--<option value="NAD">NAD</option>--}}

                {{--<option value="NGN">NGN</option>--}}

                {{--<option value="NIO">NIO</option>--}}

                {{--<option value="NOK">NOK</option>--}}

                {{--<option value="NPR">NPR</option>--}}

                {{--<option value="NZD">NZD</option>--}}

                {{--<option value="OMR">OMR</option>--}}

                {{--<option value="PAB">PAB</option>--}}

                {{--<option value="PEN">PEN</option>--}}

                {{--<option value="PGK">PGK</option>--}}

                {{--<option value="PHP">PHP</option>--}}

                {{--<option value="PKR">PKR</option>--}}

                {{--<option value="PLN">PLN</option>--}}

                {{--<option value="PYG">PYG</option>--}}

                {{--<option value="QAR">QAR</option>--}}

                {{--<option value="RON">RON</option>--}}

                {{--<option value="RSD">RSD</option>--}}

                {{--<option value="RUB">RUB</option>--}}

                {{--<option value="RWF">RWF</option>--}}

                {{--<option value="SAR">SAR</option>--}}

                {{--<option value="SBD">SBD</option>--}}

                {{--<option value="SCR">SCR</option>--}}

                {{--<option value="SDG">SDG</option>--}}

                {{--<option value="SEK">SEK</option>--}}

                {{--<option value="SGD">SGD</option>--}}

                {{--<option value="SHP">SHP</option>--}}

                {{--<option value="SLL">SLL</option>--}}

                {{--<option value="SOS">SOS</option>--}}

                {{--<option value="SRD">SRD</option>--}}

                {{--<option value="STD">STD</option>--}}

                {{--<option value="SYP">SYP</option>--}}

                {{--<option value="SZL">SZL</option>--}}

                {{--<option value="THB">THB</option>--}}

                {{--<option value="TJS">TJS</option>--}}

                {{--<option value="TMT">TMT</option>--}}

                {{--<option value="TND">TND</option>--}}

                {{--<option value="TOP">TOP</option>--}}

                {{--<option value="TRY">TRY</option>--}}

                {{--<option value="TTD">TTD</option>--}}

                {{--<option value="TWD">TWD</option>--}}

                {{--<option value="TZS">TZS</option>--}}

                {{--<option value="UAH">UAH</option>--}}

                {{--<option value="UGX">UGX</option>--}}

                {{--<option value="USD" selected="">USD</option>--}}

                {{--<option value="UYU">UYU</option>--}}

                {{--<option value="UZS">UZS</option>--}}

                {{--<option value="VEF">VEF</option>--}}

                {{--<option value="VND">VND</option>--}}

                {{--<option value="VUV">VUV</option>--}}

                {{--<option value="WST">WST</option>--}}

                {{--<option value="XAF">XAF</option>--}}

                {{--<option value="XCD">XCD</option>--}}

                {{--<option value="XDR">XDR</option>--}}

                {{--<option value="XOF">XOF</option>--}}

                {{--<option value="XPF">XPF</option>--}}

                {{--<option value="YER">YER</option>--}}

                {{--<option value="ZAR">ZAR</option>--}}

                {{--<option value="ZMW">ZMW</option>--}}

            {{--</select>--}}
            {{--<span class="postfix">to</span>--}}
            {{--<select id="CURR_TO" class="postfix">--}}

                {{--<option value="AED">AED</option>--}}

                {{--<option value="AFN">AFN</option>--}}

                {{--<option value="ALL">ALL</option>--}}

                {{--<option value="AMD">AMD</option>--}}

                {{--<option value="ANG">ANG</option>--}}

                {{--<option value="AOA">AOA</option>--}}

                {{--<option value="ARS">ARS</option>--}}

                {{--<option value="AUD">AUD</option>--}}

                {{--<option value="AWG">AWG</option>--}}

                {{--<option value="AZN">AZN</option>--}}

                {{--<option value="BAM">BAM</option>--}}

                {{--<option value="BBD">BBD</option>--}}

                {{--<option value="BDT">BDT</option>--}}

                {{--<option value="BGN">BGN</option>--}}

                {{--<option value="BHD">BHD</option>--}}

                {{--<option value="BIF">BIF</option>--}}

                {{--<option value="BND">BND</option>--}}

                {{--<option value="BOB">BOB</option>--}}

                {{--<option value="BRL">BRL</option>--}}

                {{--<option value="BSD">BSD</option>--}}

                {{--<option value="BTC">BTC</option>--}}

                {{--<option value="BTN">BTN</option>--}}

                {{--<option value="BWP">BWP</option>--}}

                {{--<option value="BYN">BYN</option>--}}

                {{--<option value="BYR">BYR</option>--}}

                {{--<option value="BZD">BZD</option>--}}

                {{--<option value="CAD">CAD</option>--}}

                {{--<option value="CDF">CDF</option>--}}

                {{--<option value="CHF">CHF</option>--}}

                {{--<option value="CLP">CLP</option>--}}

                {{--<option value="CNY">CNY</option>--}}

                {{--<option value="COP">COP</option>--}}

                {{--<option value="CRC">CRC</option>--}}

                {{--<option value="CUP">CUP</option>--}}

                {{--<option value="CVE">CVE</option>--}}

                {{--<option value="CZK">CZK</option>--}}

                {{--<option value="DJF">DJF</option>--}}

                {{--<option value="DKK">DKK</option>--}}

                {{--<option value="DOP">DOP</option>--}}

                {{--<option value="DZD">DZD</option>--}}

                {{--<option value="EGP">EGP</option>--}}

                {{--<option value="ERN">ERN</option>--}}

                {{--<option value="ETB">ETB</option>--}}

                {{--<option value="EUR">EUR</option>--}}

                {{--<option value="FJD">FJD</option>--}}

                {{--<option value="FKP">FKP</option>--}}

                {{--<option value="GBP">GBP</option>--}}

                {{--<option value="GEL">GEL</option>--}}

                {{--<option value="GHS">GHS</option>--}}

                {{--<option value="GIP">GIP</option>--}}

                {{--<option value="GMD">GMD</option>--}}

                {{--<option value="GNF">GNF</option>--}}

                {{--<option value="GTQ">GTQ</option>--}}

                {{--<option value="GYD">GYD</option>--}}

                {{--<option value="HKD">HKD</option>--}}

                {{--<option value="HNL">HNL</option>--}}

                {{--<option value="HRK">HRK</option>--}}

                {{--<option value="HTG">HTG</option>--}}

                {{--<option value="HUF">HUF</option>--}}

                {{--<option value="IDR">IDR</option>--}}

                {{--<option value="ILS">ILS</option>--}}

                {{--<option value="INR">INR</option>--}}

                {{--<option value="IQD">IQD</option>--}}

                {{--<option value="IRR" selected="">IRR</option>--}}

                {{--<option value="ISK">ISK</option>--}}

                {{--<option value="JMD">JMD</option>--}}

                {{--<option value="JOD">JOD</option>--}}

                {{--<option value="JPY">JPY</option>--}}

                {{--<option value="KES">KES</option>--}}

                {{--<option value="KGS">KGS</option>--}}

                {{--<option value="KHR">KHR</option>--}}

                {{--<option value="KMF">KMF</option>--}}

                {{--<option value="KPW">KPW</option>--}}

                {{--<option value="KRW">KRW</option>--}}

                {{--<option value="KWD">KWD</option>--}}

                {{--<option value="KYD">KYD</option>--}}

                {{--<option value="KZT">KZT</option>--}}

                {{--<option value="LAK">LAK</option>--}}

                {{--<option value="LBP">LBP</option>--}}

                {{--<option value="LKR">LKR</option>--}}

                {{--<option value="LRD">LRD</option>--}}

                {{--<option value="LSL">LSL</option>--}}

                {{--<option value="LVL">LVL</option>--}}

                {{--<option value="LYD">LYD</option>--}}

                {{--<option value="MAD">MAD</option>--}}

                {{--<option value="MDL">MDL</option>--}}

                {{--<option value="MGA">MGA</option>--}}

                {{--<option value="MKD">MKD</option>--}}

                {{--<option value="MMK">MMK</option>--}}

                {{--<option value="MNT">MNT</option>--}}

                {{--<option value="MOP">MOP</option>--}}

                {{--<option value="MRO">MRO</option>--}}

                {{--<option value="MUR">MUR</option>--}}

                {{--<option value="MVR">MVR</option>--}}

                {{--<option value="MWK">MWK</option>--}}

                {{--<option value="MXN">MXN</option>--}}

                {{--<option value="MYR">MYR</option>--}}

                {{--<option value="MZN">MZN</option>--}}

                {{--<option value="NAD">NAD</option>--}}

                {{--<option value="NGN">NGN</option>--}}

                {{--<option value="NIO">NIO</option>--}}

                {{--<option value="NOK">NOK</option>--}}

                {{--<option value="NPR">NPR</option>--}}

                {{--<option value="NZD">NZD</option>--}}

                {{--<option value="OMR">OMR</option>--}}

                {{--<option value="PAB">PAB</option>--}}

                {{--<option value="PEN">PEN</option>--}}

                {{--<option value="PGK">PGK</option>--}}

                {{--<option value="PHP">PHP</option>--}}

                {{--<option value="PKR">PKR</option>--}}

                {{--<option value="PLN">PLN</option>--}}

                {{--<option value="PYG">PYG</option>--}}

                {{--<option value="QAR">QAR</option>--}}

                {{--<option value="RON">RON</option>--}}

                {{--<option value="RSD">RSD</option>--}}

                {{--<option value="RUB">RUB</option>--}}

                {{--<option value="RWF">RWF</option>--}}

                {{--<option value="SAR">SAR</option>--}}

                {{--<option value="SBD">SBD</option>--}}

                {{--<option value="SCR">SCR</option>--}}

                {{--<option value="SDG">SDG</option>--}}

                {{--<option value="SEK">SEK</option>--}}

                {{--<option value="SGD">SGD</option>--}}

                {{--<option value="SHP">SHP</option>--}}

                {{--<option value="SLL">SLL</option>--}}

                {{--<option value="SOS">SOS</option>--}}

                {{--<option value="SRD">SRD</option>--}}

                {{--<option value="STD">STD</option>--}}

                {{--<option value="SYP">SYP</option>--}}

                {{--<option value="SZL">SZL</option>--}}

                {{--<option value="THB">THB</option>--}}

                {{--<option value="TJS">TJS</option>--}}

                {{--<option value="TMT">TMT</option>--}}

                {{--<option value="TND">TND</option>--}}

                {{--<option value="TOP">TOP</option>--}}

                {{--<option value="TRY">TRY</option>--}}

                {{--<option value="TTD">TTD</option>--}}

                {{--<option value="TWD">TWD</option>--}}

                {{--<option value="TZS">TZS</option>--}}

                {{--<option value="UAH">UAH</option>--}}

                {{--<option value="UGX">UGX</option>--}}

                {{--<option value="USD">USD</option>--}}

                {{--<option value="UYU">UYU</option>--}}

                {{--<option value="UZS">UZS</option>--}}

                {{--<option value="VEF">VEF</option>--}}

                {{--<option value="VND">VND</option>--}}

                {{--<option value="VUV">VUV</option>--}}

                {{--<option value="WST">WST</option>--}}

                {{--<option value="XAF">XAF</option>--}}

                {{--<option value="XCD">XCD</option>--}}

                {{--<option value="XDR">XDR</option>--}}

                {{--<option value="XOF">XOF</option>--}}

                {{--<option value="XPF">XPF</option>--}}

                {{--<option value="YER">YER</option>--}}

                {{--<option value="ZAR">ZAR</option>--}}

                {{--<option value="ZMW">ZMW</option>--}}

            {{--</select>--}}
            {{--<button id="convert" onclick="getCurrencyUsingJQuery()" class="button postfix">Convert</button>--}}
            {{--<input type="text" id="CURR_VAL" readonly="" placeholder="Press Convert button" style="background-color: #eee; font-weight: bold;">--}}
        {{--</div>--}}
    {{--</div>--}}
</body>
</html>
<script src={{ asset('/js/app.js') }}></script>

