@extends('layouts.user.profile')

@section('workplace-div')
    <div id="wp-wallets">
        <table id="wallets-table" cellpadding="10px" border="1px">
            <tbody>
            <tr class="wallet" onclick="showWalletInfo('Sapphire', '839128319071284', 38129381, 123)">
                <td class="wallet-name">Sapphire</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>

            <tr class="wallet" onclick="showWalletInfo('Riall', '7312984712841274128', 31278, 43)">
                <td class="wallet-name">Riall</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="showWalletInfo('Dollar', '6317236176712', 32190, 12)">
                <td class="wallet-name">Dollar</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="showWalletInfo('Euro', '418471892471', 2321, 82)">
                <td class="wallet-name">Euro</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            </tbody>
        </table>
        <div id="walletInfo" hidden>
            <p class="address"> wallet address: </p>
            <p class="currency-amount">your amount: </p>
            <input class="buy-currency" placeholder="buy amount">
            <p class="fee"></p>
            <input type="submit" value="Buy">
            <br>
            <input class="sell-currency" placeholder="sell amount">
            <p class="fee"></p>
            <input type="submit" value="Sell">
        </div>
    </div>

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


