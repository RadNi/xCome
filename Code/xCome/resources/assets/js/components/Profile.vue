<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-wallets">
                    <table id="wallets-table" cellpadding="10px" border="1px">
                        <tbody>
                        <tr v-for="wallet in this.wallets"  v-on:click="showWalletInfo(wallet.name, wallet.address, wallet.amount, wallet)">
                            <td class="wallet-name">
                                wallet name is :
                                {{ wallet.name }}
                            </td>
                            <td class="rel-price">
                                wallet price is :
                                {{ wallet.amount }}
                            </td>
                        </tr>
                        <!--<tr class="wallet" v-on:click="showWalletInfo('Sapphire', '839128319071284', 38129381, 123)">-->
                            <!--<td class="wallet-name">Sapphire</td>-->
                            <!--<td class="rel-price">Real time price</td>-->
                            <!--<td class="diagram">Price diagram</td>-->
                        <!--</tr>-->

                        <!--<tr class="wallet" onclick="showWalletInfo('Riall', '7312984712841274128', 31278, 43)">-->
                            <!--<td class="wallet-name">Riall</td>-->
                            <!--<td class="rel-price">Real time price</td>-->
                            <!--<td class="diagram">Price diagram</td>-->
                        <!--</tr>-->
                        <!--<tr class="wallet" onclick="showWalletInfo('Dollar', '6317236176712', 32190, 12)">-->
                            <!--<td class="wallet-name">Dollar</td>-->
                            <!--<td class="rel-price">Real time price</td>-->
                            <!--<td class="diagram">Price diagram</td>-->
                        <!--</tr>-->
                        <!--<tr class="wallet" onclick="showWalletInfo('Euro', '418471892471', 2321, 82)">-->
                            <!--<td class="wallet-name">Euro</td>-->
                            <!--<td class="rel-price">Real time price</td>-->
                            <!--<td class="diagram">Price diagram</td>-->
                        <!--</tr>-->
                        </tbody>
                    </table>
                    <div id="walletInfo" hidden>
                        <p class="address"> wallet address: {{ selected_wallet.address }}</p>
                        <p class="currency-amount">your amount: {{ selected_wallet.amount }}</p>
                        <input class="buy-currency" placeholder="buy amount">
                        <p class="fee"></p>
                        <input type="submit" value="Buy">
                        <br>
                        <input class="sell-currency" placeholder="sell amount">
                        <p class="fee"></p>
                        <input type="submit" value="Sell">
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'profile',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                selected_wallet: {
                    address: '',
                    amount: 0
                },
                wallets: [],
                type: ''
            }
        },
        mounted() {
//            window.Laravel = {
//               csrfToken: this.csrf_field
//            };
//            alert(this.x_data);
            this.type = this.x_data.type;
            this.wallets = this.x_data.wallets;
//            console.log(this.wallets)
//            for(let w of this.wallets){
//                console.log(w)
//            }

        },
        methods: {
            showWalletInfo(walletName, walletAddress, currencyAmount, wallet) {
//                walletInfo.getElementsByClassName('address')[0].innerHTML ="wallet address " +walletAddress;
//                walletInfo.getElementsByClassName('currency-amount')[0].innerHTML ="your amount " +currencyAmount;
//                walletInfo.getElementsByClassName('address')[0].innerHTML ="wallet address " +walletAddress;
//                walletInfo.getElementsByClassName('fee')[0].innerHTML = "fee is "+ fee;
//                walletInfo.getElementsByClassName('fee')[1].innerHTML = "fee is "+ fee;
                this.selected_wallet = wallet;
                walletInfo.hidden = false;
            }
        }
    }
</script>