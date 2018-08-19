<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-apply-pay">
                    <form method="post" :action="this.applyPayURL">
                        <input type="hidden" name="_token" v-model="csrf"><br/>
                        <input id="payee-id" name="payee-id" placeholder="Payee credit card" type="number">
                        <input id="type-rial" name="type" type="radio" value="rial">Rial
                        <input id="type-dollar" name="type" type="radio" value="dollar">Dollar
                        <input id="type-euro" name="type" type="radio" value="euro">Euro
                        <input id="price" name="price" placeholder="price" type="number" v-model="price">$
                        <p id="fee"> {{ getFeePrice() }} </p>
                        <input id="submit" name="submit" type="submit">
                    </form>
                </div>
            </div>
        </div>
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
            this.applyPayURL = window.customURLs.applyPayURL;
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