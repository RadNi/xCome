<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div id="add-clerk">

                    <button id="addShow" onclick="popupAdd.hidden = false;addShow.hidden = true;">Add new clerk</button>

                    <div id="popupAdd" hidden>
                        <h4>new Clerk Informations</h4>
                        <input id="email" type="email" name="email" placeholder="Email"><br>
                        <input id="password" type="password" name="password" placeholder="Password"><br>
                        <input id="repass" type="password" name="retryPass" placeholder="Repeat Password"><br>
                        <input id="name" type="name" name="name" placeholder="Name"><br>
                        <input id="family" type="name" name="familyName" placeholder="Family"><br>
                        <input id="username" type="name" name="username" placeholder="Username"><br>
                        <input id="income" type="number" name="income" placeholder="income"><br>
                        <input id="address" type="address" name="address" placeholder="address"><br>
                        <input id="captcha" type="text" name="captcha" placeholder="captcha"><br>
                        <input id="person_id" type="text" name="PersonID" placeholder="Person ID"><br>
                        <input id="cellphone" type="text" name="CellPhone" placeholder="Phone Number"><br>
                        <button id="add" data-dismiss="modal">Add</button>
                    </div>

                </div>

                <input id="search" name="searchbox" placeholder="Search here">
                <table id="users-table" cellpadding="10px" border="2px">
                    <thead>
                    <tr v-for="th in table.ths">
                        <th>{{ th }}</th>
                        <!--<th>Name</th>-->
                        <!--<th>Family Name</th>-->
                        <!--<th>Username</th>-->
                        <!--<th>PID</th>-->
                        <!--<th>Email</th>-->
                        <!--<th>Phone number</th>-->
                        <!--<th>Condition</th>-->
                        <!--<th>Check</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="tr in table.trs">
                        <td v-for="td in tr.tds" :class="td.class">{{ td.value }}</td>
                        <td class="checkbox"><input type="checkbox" v-on:click=""/></td>
                        <!--<td class="name">Name</td>-->
                        <!--<td class="family">Family name</td>-->
                        <!--<td class="username">Username</td>-->
                        <!--<td class="pid">PID</td>-->
                        <!--<td class="email">email</td>-->
                        <!--<td class="phonenumber">Phone number</td>-->
                        <!--<td class="condition">Active or Deactivate</td>-->
                        <td class="checkbox"><button v-on:click="ActiveClerk(tr, true)">Active User</button></td>
                        <td class="checkbox"><button v-on:click="ActiveClerk(tr, false)">Deactivate User</button></td>
                    </tr>
                    <!--<tr>-->
                        <!--<td class="name">Name</td>-->
                        <!--<td class="family">Family name</td>-->
                        <!--<td class="username">Username</td>-->
                        <!--<td class="pid">PID</td>-->
                        <!--<td class="email">email</td>-->
                        <!--<td class="phonenumber">Phone number</td>-->
                        <!--<td class="condition">Active or De-active</td>-->
                        <!--<td class="checkbox"><input type="checkbox"></td>-->
                    <!--</tr>-->
                    </tbody>
                </table>
                <!--@if(strcmp($type, "boss") == 0)-->
                <!---->
                <!---->
                <!--&lt;!&ndash;&ndash;&gt;-->
                <!--<button id="active-butt">Active Users</button>-->
                <!--<button id="deactivate-butt">Deactivate Users</button>-->
                <!--@endif-->

            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'clerks_table',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
                value: '',
                table: []
            }
        },
        mounted() {
            console.log(this.x_data);
            this.table = this.x_data.table;
//            this.transactions = this.x_data.transactions;
//            this.type = this.x_data.type;
//            this.csrf = this.csrf_field;
//            this.fee = this.x_data.fee;
//            this.internalTransURL = window.customURLs.internalTransURL;
        },
        methods: {

            ActiveClerk(query, active) {

                let element;

                for(element of query.tds){
                    console.log(element)
                    if (element.class === 'id'){
                        this.value = element.value;
                    }
                }
                console.log(this.value);
                window.axios.post('http://localhost:8888/profile/active-user', {
                    value: this.value,
                    active: active
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {


                    location.reload();
                    console.log(location.href);
                    console.log(respond);
                    console.log(respond.data)

                }).catch(e => {

                    console.log(e)
                })
            },

        }
    }
</script>