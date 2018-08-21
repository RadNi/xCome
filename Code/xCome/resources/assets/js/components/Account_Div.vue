<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="account-div">
                    <p>current credit is: </p>
                    <p id="credit"></p>
                    <button id="charge" onclick="popup.hidden = false">Charge</button>
                    <div id="popup" hidden>
                        <h4>Write amount you need</h4>
                        <input id="amount" type="number" placeholder="Toman" v-model="amount">
                        <button id="buy" data-dismiss="modal" v-on:click="buy_amount(amount)">Buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'account_div',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
                amount: 0

            }
        },
        mounted() {
            console.log(this.x_data);
            this.type = this.x_data.type;
            this.csrf = this.csrf_field;
        },
        methods: {
            buy_amount(amount) {

                console.log(amount);

                window.axios.post('http://localhost:8888/profile/charge-credit', amount, {
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

            }

        }
    }
</script>