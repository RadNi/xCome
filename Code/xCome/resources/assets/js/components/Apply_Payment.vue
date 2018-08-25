<template>
    <div class="container">
        <!--<div class="row">-->
            <!--<div class="col-md-8 col-md-offset-2">-->
                <!--<div id="wp-apply-pay">-->
                    <!--<form method="post" :action="this.applyPayURL">-->
                        <!--<input type="hidden" name="_token" v-model="csrf"><br/>-->
                        <!--<input id="payee-id" name="payee-id" placeholder="Payee credit card" type="text">-->
                        <!--<input id="type-rial" name="type" type="radio" value="rial">Rial-->
                        <!--<input id="type-dollar" name="type" type="radio" value="dollar">Dollar-->
                        <!--<input id="type-euro" name="type" type="radio" value="euro">Euro-->
                        <!--<input id="price" name="price" placeholder="price" type="number" v-model="price">$-->
                        <!--<p id="fee"> {{ getFeePrice() }} </p>-->
                        <!--<input id="submit" name="submit" type="submit">-->
                    <!--</form>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <form method="post" :action="this.applyPayURL">
            <input type="hidden" name="_token" v-model="csrf">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Payee Credit Card" name="payee-id" id="payee-id" placeholder="Payee Credit Card">
                <select class="custom-select" name="type" id="Curr_Type">
                    <option selected>Choose...</option>
                    <option value="rial">Rial</option>
                    <option value="dollar">Dollar</option>
                    <option value="euro" selected="">Euro</option>
                </select>
                <input type="number" class="form-control" aria-label="Price" name="price" id="price" placeholder="Price" v-model="price">
                <span class="input-group-text" id="feeLabel">fee</span>
                <input type="text" class="form-control" aria-label="Fee" name="fee" id="fee" readonly="" v-bind:placeholder=getFeePrice()>
                <input class="btn btn-outline-secondary" type="submit" id="submit" name="submit" value="submit">
            </div>
        </form>
    </div>


</template>

<script>

    export default {
        name: 'apply_payment',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
                applyPayURL: '',
                fee: '',
                price: ''
            }
        },
        mounted() {
            this.type = this.x_data.type;
            this.csrf = this.csrf_field;
            this.fee = this.x_data.fee;
            this.applyPayURL = window.customURLs.foreignPayURL;
        },
        methods: {
            getFeePrice: function () {

                let ret = parseFloat(this.fee) * parseFloat(this.price);

                if (!isNaN(ret))
                    return ret;
                return 0;
            }
        }
    }
</script>