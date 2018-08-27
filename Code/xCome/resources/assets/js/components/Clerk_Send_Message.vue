<template>
    <div class="container">
                    <div class="input-group mb-3">
                        <div id="send-message">
                            <textarea id="message" v-model="message">Message</textarea>
                            <input id="send" type="submit" value="Send" v-on:click="sendMessage(message)">
                        </div>
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
        name: 'clerk_send_message',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                amount: 0,
                wallets: [],
                type: '',
                exchange_amount: 0,
                error_message:'',
                message: ''
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
            sendMessage(message) {
                window.axios.post(window.customURLs.clerkSendMessage, {
                    'message': message
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data);
//                  console.log(JSON.parse(respond));

                    if (respond.data === 'done'){
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