@extends('layouts.user.profile')

@section('workplace-div')

    <div id="app">
        <profile v-bind:data="{{  }}">

        </profile>
    </div>
    <script src="js/app.js"></script>


    <script>
        function showWalletInfo(walletName, walletAddress, currencyAmount, fee) {
            walletInfo.getElementsByClassName('address')[0].innerHTML ="wallet address " +walletAddress;
            walletInfo.getElementsByClassName('currency-amount')[0].innerHTML ="your amount " +currencyAmount;
            walletInfo.getElementsByClassName('address')[0].innerHTML ="wallet address " +walletAddress;
            walletInfo.getElementsByClassName('fee')[0].innerHTML = "fee is "+ fee;
            walletInfo.getElementsByClassName('fee')[1].innerHTML = "fee is "+ fee;
            walletInfo.hidden = false;
        }
    </script>
@stop


