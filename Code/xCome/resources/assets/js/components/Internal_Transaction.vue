<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-apply-pay">
                    <!--<form method="post" :action="this.internalTransURL">-->
                        <input type="hidden" name="_token" v-model="csrf"><br/>
                        <input id="payee-id" name="payee-id" placeholder="Payee credit card" type="text" v-model="payment.address">
                        <input id="type-rial" name="type" type="radio" value="rial" v-model="payment.type">Rial
                        <input id="type-dollar" name="type" type="radio" value="dollar" v-model="payment.type">Dollar
                        <input id="type-euro" name="type" type="radio" value="euro" v-model="payment.type">Euro
                        <input id="price" name="price" placeholder="price" type="number" v-model="payment.price">$
                        <p id="fee"> {{ getFeePrice() }} </p>
                        <input id="submit" name="submit" type="submit" v-on:click="sendTransaction()">
                    <!--</form>-->
                </div>

                <div id="user-registration" hidden>
                    <input id="email" type="email" name="email" placeholder="Email"><br>
                    <input id="password" type="password" name="password" placeholder="Password"><br>
                    <input id="repass" type="password" name="password_confirmation" placeholder="Repeat Password"><br>
                    <input id="name" type="name" name="name" placeholder="Name"><br>
                    <input id="family" type="name" name="familyName" placeholder="Family"><br>
                    <input id="username" type="name" name="username" placeholder="Username"><br>
                    {{--<input id="" type="age" name="age" placeholder="age"><br>--}}
                    <input id="address" type="address" name="address" placeholder="address"><br>
                    {{--<input id="captcha" type="text" name="captcha" placeholder="captcha"><br>--}}
                    <input id="person_id" type="text" name="PersonID" placeholder="Person ID"><br>
                    <input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number"><br>
                    <input id="submit" type="submit" value="register">

                </div>

            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'internal_transaction',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
                internalTransURL: '',
                fee: '',
                payment: {
                    price: 0,
                    type: '',
                    address: ''
                }
//                price: '',

            }
        },
        mounted() {
            this.type = this.x_data.type;
            this.csrf = this.csrf_field;
            this.fee = this.x_data.fee;
            this.internalTransURL = window.customURLs.internalTransURL;
        },
        methods: {

            sendTransaction() {
              window.axios.post('http://localhost:8888/profile/do-int-trans', this.payment, {
                  Cookie: document.cookie,
                  'Access-Control-Allow-Origin': '*',
                  "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
              }).then(respond => {

                  if (!respond.user) {

                  }

              }).catch(e => {
                  console.log(e)
                })
            },

            getFeePrice: function () {

                let ret = parseFloat(this.fee) * parseFloat(this.payment.price);

                if (!isNaN(ret))
                    return ret;
                return 0;
            }
        }
    }
</script>