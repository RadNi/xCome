<template>
    <div class="container">
        <!--<div class="row">-->
            <!--<div class="col-md-8 col-md-offset-2">-->
                <!--<div id="wp-wallets">-->
                    <!--<table id="wallets-table" cellpadding="10px" border="1px">-->
                        <!--<tbody>-->
                        <!--<tr v-for="wallet in this.wallets"  v-on:click="showWalletInfo(wallet)">-->
                            <!--<td class="wallet-name">-->
                                <!--wallet name is :-->
                                <!--{{ wallet.name }}-->
                            <!--</td>-->
                            <!--<td class="rel-price">-->
                                <!--wallet price is :-->
                                <!--{{ wallet.amount }}-->
                            <!--</td>-->
                        <!--</tr>-->
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
                        <!--</tbody>-->
                    <!--</table>-->
                    <div class="table-responsive">
                        <table class="table table-striped col-12">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Address</th>
                                <th scope="col">Exchange</th>
                                <th scope="col">Exchange Fee</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="wallet in this.wallets" >
                                <th scope="row">{{wallet.index}}</th>
                                <td>{{wallet.name}}</td>
                                <td>{{wallet.amount}}</td>
                                <td>{{wallet.address}}</td>
                                <td>
                                    <div class="input-group" v-if="wallet.name !== 'rial'">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" v-bind:id="'buy'+wallet.name" v-bind:name="'buy'+wallet.name" v-on:click="buy_currency(amount, wallet.name)">Buy</button>
                                        </div>
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" v-bind:id="'sell'+wallet.name" v-bind:name="'sell'+wallet.name" v-on:click="sell_currency(amount, wallet.name)">Sell</button>
                                        </div>
                                        <input type="number" v-bind:id="wallet.name" v-bind:name="wallet.name" class="form-control" placeholder="Amount">
                                    </div>
                                </td>
                                <td v-if="wallet.name !== 'rial'">
                                    Live exchange fee goes here
                                </td>
                                <td v-else >
                                </td>
                            </tr>
                            <tr>
                                <td class="table-danger" v-if="error_message !== '' ">
                                    {{error_message}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div id="walletInfo" hidden>-->
                        <!--<p class="address"> wallet address: {{ selected_wallet.address }}</p>-->
                        <!--<p class="currency-amount">your amount: {{ selected_wallet.amount }}</p>-->
                        <!--<input class="buy-currency" placeholder="buy amount" v-model="exhange_amount">-->
                        <!--<p class="fee"></p>-->
                        <!--<input type="submit" value="Buy" v-on:click="buy_currency(buy_amount, selected_wallet.name)">-->
                        <!--<br>-->
                        <!--<input class="sell-currency" placeholder="sell amount" v-model="sell_amount">-->
                        <!--&lt;!&ndash;<p class="fee"></p>&ndash;&gt;-->
                        <!--<input type="submit" value="Sell" v-on:click="sell_currency(sell_amount, selected_wallet.name)">-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    </div>


</template>

<script>

    export default {
        name: 'wallets',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                amount: 0,
                wallets: [],
                type: '',
                exchange_amount: 0,
                error_message:''
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
                window.axios.post(window.customURLs.sellCurrency, {
                    'amount': amount,
                    'wallet_name': wallet_name
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data);
                    location.reload()
//                  console.log(JSON.parse(respond));

//                    location.href = 'http://localhost:8888/profile';

                }).catch(e => {
                    console.log(e)
                })
            },

            buy_currency(amount, wallet_name) {
                window.axios.post(window.customURLs.buyCurrency, {
                    'amount': amount,
                    'wallet_name': wallet_name
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data);
//                  console.log(JSON.parse(respond));

                    if (respond.data !== '\'not enough currency\''){
                        location.reload()
                    }
                    this.error_message = respond.data;
//                    location.href = 'http://localhost:8888/profile';

                }).catch(e => {
                    console.log(e)
                })
            },

        }
    }
</script>