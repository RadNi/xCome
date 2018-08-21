<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-wallets">
                    <table id="wallets-table" cellpadding="10px" border="1px">
                        <tbody>
                        <tr v-for="wallet in this.wallets"  v-on:click="showWalletInfo(wallet)">
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
                        <input class="buy-currency" placeholder="buy amount" v-model="buy_amount">
                        <p class="fee"></p>
                        <input type="submit" value="Buy" v-on:click="buy_currency(buy_amount, selected_wallet.name)">
                        <br>
                        <input class="sell-currency" placeholder="sell amount" v-model="sell_amount">
                        <!--<p class="fee"></p>-->
                        <input type="submit" value="Sell" v-on:click="sell_currency(sell_amount, selected_wallet.name)">
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'wallets',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                selected_wallet: {
                    address: '',
                    amount: 0,
                    name: ''
                },
                wallets: [],
                type: '',
                sell_amount: 0,
                buy_amount: 0
            }
        },
        mounted() {
//            window.Laravel = {
//               csrfToken: this.csrf_field
//            };
//            alert(this.x_data);
            this.type = this.x_data.type;
            this.wallets = this.x_data.wallets;
//            window.axios.post('http://localhost:8888/profile', {
//                headers: {
//                    Cookie: document.cookie
//                }
//            }).then(respond => {
//                console.log(respond);
//            })
//            console.log(this.wallets)
//            for(let w of this.wallets){
//                console.log(w)
//            }

        },
        methods: {


            sell_currency(amount, wallet_name) {
                window.axios.post('http://localhost:8888/profile/sell-currency', {
                    'amount': amount,
                    'wallet_name': wallet_name
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data)
//                  console.log(JSON.parse(respond));

                }).catch(e => {
                    console.log(e)
                })
            },

            buy_currency(amount, wallet_name) {
                window.axios.post('http://localhost:8888/profile/buy-currency', {
                    'amount': amount,
                    'wallet_name': wallet_name
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data)
//                  console.log(JSON.parse(respond));

                }).catch(e => {
                    console.log(e)
                })
            },


            showWalletInfo(wallet) {

//                console.log(this.selected_wallet)
                this.selected_wallet = wallet;
                walletInfo.hidden = false;
            }
        }
    }
</script>