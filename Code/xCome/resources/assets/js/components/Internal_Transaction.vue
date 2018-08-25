<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!--<div id="wp-apply-pay">-->
                    <!--&lt;!&ndash;<form method="post" :action="this.internalTransURL">&ndash;&gt;-->
                        <!--<input type="hidden" name="_token" v-model="csrf"><br/>-->
                        <!--<input id="payee-id" name="payee-id" placeholder="Payee credit card" type="text" v-model="payment.address">-->
                        <!--<input id="type-rial" name="type" type="radio" value="rial" v-model="payment.type">Rial-->
                        <!--<input id="type-dollar" name="type" type="radio" value="dollar" v-model="payment.type">Dollar-->
                        <!--<input id="type-euro" name="type" type="radio" value="euro" v-model="payment.type">Euro-->
                        <!--<input id="price" name="price" placeholder="price" type="number" v-model="payment.price">$-->
                        <!--<p id="fee"> {{ getFeePrice() }} </p>-->
                        <!--<input id="submit" name="submit" type="submit" v-on:click="sendTransaction()">-->
                    <!--&lt;!&ndash;</form>&ndash;&gt;-->
                <!--</div>-->
                <form @submit.prevent="sendTransaction">
                    <input type="hidden" name="_token" v-model="csrf">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Payee Credit Card" name="payee-id" id="payee-id" placeholder="Payee Credit Card" v-model="payment.address">
                        <select class="custom-select" name="type" id="Curr_Type" v-model="payment.type">
                            <option selected>Choose...</option>
                            <option value="rial">Rial</option>
                            <option value="dollar">Dollar</option>
                            <option value="euro" selected="">Euro</option>
                        </select>
                        <input type="number" class="form-control" aria-label="Price" name="price" id="price" placeholder="Price" v-model="payment.price">
                        <span class="input-group-text" id="feeLabel">fee</span>
                        <input type="text" class="form-control" aria-label="Fee" name="fee" id="fee" readonly="" v-bind:placeholder=getFeePrice() v-model="payment.fee">
                        <input class="btn btn-outline-secondary" type="submit" id="login" name="submit" value="submit">
                    </div>
                </form>
                <!--<div id="user-registration" v-bind:hidden="this.hide_form">-->
                    <!--<input id="email" type="email" name="email" placeholder="Email" v-model="new_user.email"><br>-->
                    <!--<input id="password" type="password" name="password" placeholder="Password" v-model="new_user.password"><br>-->
                    <!--<input id="repass" type="password" name="password_confirmation" placeholder="Repeat Password" v-model="new_user.repass"><br>-->
                    <!--<input id="name" type="name" name="name" placeholder="Name" v-model="new_user.name"><br>-->
                    <!--<input id="family" type="name" name="familyName" placeholder="Family" v-model="new_user.family_name"><br>-->
                    <!--<input id="username" type="name" name="username" placeholder="Username" v-model="new_user.username"><br>-->
                    <!--<input id="address" type="address" name="address" placeholder="address" v-model="new_user.address"><br>-->
                    <!--<input id="person_id" type="text" name="PersonID" placeholder="Person ID" v-model="new_user.national_id"><br>-->
                    <!--<input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number" v-model="new_user.phonenumber"><br>-->
                    <!--<input id="submit-user" type="submit" value="register" v-on:click="createUser()">-->
                <!--</div>-->

                <form id="user-registration" v-bind:hidden="this.hide_form">
                    <div class="form-group">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" v-model="new_user.username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" v-model="new_user.email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" v-model="new_user.password">
                    </div>
                    <div class="form-group">
                        <label for="repass" class="sr-only">Password Confirmation</label>
                        <input type="password" class="form-control" id="repass" name="password_confirmation" placeholder="Password Confirmation" v-model="new_user.repass">
                    </div>
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" v-model="new_user.name">
                    </div>
                    <div class="form-group">
                        <label for="family" class="sr-only">Family Name</label>
                        <input type="text" class="form-control" id="family" name="familyName" placeholder="Family Name" v-model="new_user.family_name">
                    </div>
                    <div class="form-group">
                        <label for="address" class="sr-only">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" v-model="new_user.address">
                    </div>
                    <div class="form-group">
                        <label for="person_id" class="sr-only">National ID</label>
                        <input type="text" class="form-control" id="person_id" name="national_id" placeholder="National ID" v-model="new_user.national_id">
                    </div>
                    <div class="form-group">
                        <label for="cellphone" class="sr-only">Phone Number</label>
                        <input type="text" class="form-control" id="cellphone" name="CellPhone" placeholder="Phone Number" v-model="new_user.phonenumber">
                    </div>
                    <button type="submit" id="submit" class="btn btn-secondary">Submit</button>
                </form>
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
                hide_form: true,
                internalTransURL: '',
                fee: '',
                payment: {
                    price: 0,
                    type: '',
                    address: ''
                },
                new_user: {
                    name: '',
                    email: '',
                    family_name: '',
                    password: '',
                    repass: '',
                    username: '',
                    national_id: '',
                    address: '',
                    phonenumber: '',
                    wallet_type: '',
                    wallet_address: '',
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

            createUser() {
                this.new_user.wallet_address = this.payment.address;
                this.new_user.wallet_type = this.payment.type;

                window.axios.post(window.customURLs.registerNewUser, this.new_user, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {
                    console.log(respond);

                }).catch(e => {
                    console.log(e)
                })
            },
            sendTransaction() {
                console.log("helo", this.payment.type, this.payment.address, this.payment.price, this.payment.fee);
              window.axios.post(window.customURLs.doIntTrans, this.payment, {
                  Cookie: document.cookie,
                  'Access-Control-Allow-Origin': '*',
                  "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
              }).then(respond => {

                  console.log(respond);
                  console.log(respond.data);
//                  console.log(JSON.parse(respond));
                  if (!respond.data.user) {
                      this.hide_form = false;
                      console.log(this.hide_form);
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