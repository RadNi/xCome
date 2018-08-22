<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <input id="search" name="searchbox" placeholder="Search here">
                <table id="transactions-table" cellpadding="10px" v-for="table in tables">
                    <thead>
                    <tr>
                        <th v-for="th in table.ths">{{ th.value }}</th>
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
                        <td v-bind:class="td.class" v-for="td in trans.tds">{{ td.value }}</td>
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
        </div>
    </div>


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
            console.log(this.x_data);
            this.tables = this.x_data.tables;
            this.transactions = this.x_data.transactions;
            this.type = this.x_data.type;
            this.csrf = this.csrf_field;
            this.fee = this.x_data.fee;
            this.internalTransURL = window.customURLs.internalTransURL;
        },
        methods: {

        }
    }
</script>