@extends('layouts.boss.profile')

@section('workplace-div')
    <div id="wp-wallets">
        <table id="wallets-table" cellpadding="10px" border="1px">
            <tbody>
            <tr class="wallet" onclick="showWalletInfo('Sapphire', '839128319071284', 38129381)">
                <td class="wallet-name">Sapphire</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>

            <tr class="wallet" onclick="walletInfo.hidden = false;walletInfo.getElementsByClassName('address')[0].innerHTML = 'wallet address: 38912'">
                <td class="wallet-name">Riall</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="walletInfo.hidden = false;walletInfo.getElementsByClassName('address')[0].innerHTML = 'wallet address: 481924'">
                <td class="wallet-name">Dollar</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="walletInfo.hidden = false;walletInfo.getElementsByClassName('address')[0].innerHTML = 'wallet address: 3718273918'">
                <td class="wallet-name">Euro</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            </tbody>
        </table>
        <div id="walletInfo" hidden>
            <p class="address"> wallet address: </p>
            <p class="currency-amount">your amount: </p>
            <input class="buy-currency" placeholder="amount">
            <input type="submit" value="Buy">
            <input class="sell-currency" placeholder="amount">
            <input type="submit" value="Sell">
        </div>
    </div>
    <script>
        function showWalletInfo(walletName, walletAddress, currencyAmount) {
            walletInfo.getElementsByClassName('address')[0].innerHTML ="wallet address " +walletAddress;
            walletInfo.getElementsByClassName('currency-amount')[0].innerHTML ="your amount " +currencyAmount;
            walletInfo.getElementsByClassName('address')[0].innerHTML ="wallet address " +walletAddress;
            walletInfo.hidden = false;

        }
    </script>
@stop


