<template>
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<div class="col-md-8 col-md-offset-2">-->

                <!--<input id="search" name="searchbox" placeholder="Search here">-->
                <div class="table-responsive">
                    <table class="table table-striped col-12" v-bind:id="table.id" v-for="table in tables">
                        {{ table.id }}
                        <thead>
                        <tr>
                            <th scope="col" v-for="th in table.ths">{{ th }}</th>
                            <!--<th>Fee</th>-->
                            <!--<th>Currency Type</th>-->
                            <!--<th>From</th>-->
                            <!--<th>To</th>-->
                            <!--<th>Calender</th>-->
                            <!--<th>Value</th>-->
                            <!--<th>Transaction ID</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="trans in table.transactions">
                            <td v-for="td in trans.tds" v-bind:class="td.class">{{ td.value }}</td>
                            <button v-if="table.id == 'unchecked-trans-table' && type != 'user'"  v-on:click="acceptTrans(trans, true)" class="btn-secondary">Accept</button>
                            <button v-if="table.id == 'unchecked-trans-table' && type != 'user'" v-on:click="acceptTrans(trans, false)" class="btn-secondary">Reject</button>
                            <!--<td class="fee">{{ trans.fee }}</td>-->
                            <!--<td class="currency">{{ trans.type }}</td>-->
                            <!--<td class="from">{{ trans.from }}</td>-->
                            <!--<td class="to">{{ trans.to }}</td>-->
                            <!--<td class="calender">{{ trans.calender }}</td>-->
                            <!--<td class="value">{{ trans.value }}</td>-->
                            <!--<td class="transaction-id">{{ trans.transaction_id }}</td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->


</template>

<script>

    export default {
        name: 'transaction_history',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
                tables: []
            }
        },
        mounted() {
            console.log(this.x_data.tables);
            this.tables = this.x_data.tables;
//            this.transactions = this.x_data.transactions;
            this.type = this.x_data.type;
//            this.csrf = this.csrf_field;
//            this.fee = this.x_data.fee;
//            this.internalTransURL = window.customURLs.internalTransURL;
        },
        methods: {
            acceptTrans(transaction, accept) {
                    window.axios.post(window.customURLs.acceptTransaction, {
                        transaction: transaction,
                        accept: accept
                    }, {
                        Cookie: document.cookie,
                        'Access-Control-Allow-Origin': '*',
                        "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                    }).then(respond => {

                        console.log(respond);
                        console.log(respond.data);

                        location.reload();

//                  console.log(JSON.parse(respond));

                    }).catch(e => {
                        console.log(e)
                    })
            }
        }
    }
</script>