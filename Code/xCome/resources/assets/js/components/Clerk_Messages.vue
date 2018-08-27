<template>



                <!--<input id="search" name="searchbox" placeholder="Search here">-->
                <div class="table-responsive" id="clerk-messages-table">
                    <table class="table table-striped col-12" id="messages-table">
                        <thead>
                        <tr>
                            <th scope="col">Message</th>
                            <th scope="col">Clerk ID</th>
                            <th scope="col">Clerk Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="message in messages">

                            <td class="message">{{ message.value }}</td>
                            <td class="clerk-id">{{ message.creator_id }}</td>
                            <td class="clerk-name">{{ message.creator_name }}</td>
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
        name: 'clerk_messages',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
                messages: []
            }
        },
        mounted() {
            console.log(this.x_data.tables);
            this.messages = this.x_data.messages;
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