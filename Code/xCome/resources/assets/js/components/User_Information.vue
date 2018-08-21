<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    <table id="user-info-table">
                        <td >
                            <input id="phonenumber" name="phonenumber" placeholder="Phone Number" v-model="new_info.phonenumber">
                        </td>
                        <td >
                            <p id="pid" name="pid">{{ x_data.info.national_id }}</p>
                        </td>

                        <td >
                            <input id="avatar" name="avatar" placeholder="Avatar" v-model="new_info.avatar">
                        </td>

                        <td >
                            <input id="password" type="password" name="password" placeholder="Password" v-model="new_info.password">
                        </td>

                        <td >
                            <input id="ret-password" type="password" name="ret-password" placeholder="Repeat new password" v-model="new_info.repass">
                        </td>

                        <td >
                            <p id="name" name="name" >{{ x_data.info.name }}</p>
                        </td>

                        <td >
                            <p id="family" name="family">{{ x_data.info.family_name }}</p>
                        </td>

                        <td >
                            <input id="email" name="email" placeholder="email" type="email" v-model="new_info.email">
                        </td>

                        <td >
                            <div id="reportMethod">
                                Choose Report method:<br>
                                SMS <input id="smsReport" class="report" name="sms" type="checkbox" v-model="new_info.report.sms" v-on:change="new_info.report.sms = !new_info.report.sms">
                                Telegram <input id="tgReport" class="report" name="tg"  type="checkbox" v-model="new_info.report.telegram" v-on:change="new_info.report.telegram = !new_info.report.telegram">
                                Email <input id="emailReport" class="report" name="email" type="checkbox" v-model="new_info.report.email" v-on:change="new_info.report.email = !new_info.report.email">
                            </div>
                        </td>
                    </table>
                    <button id="change" v-on:click="send_new_info()">Change</button>

            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'user_information',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                type: '',
                csrf : '',
//                person_id: '',
//                user_name: '',
//                user_family_name: '',
                new_info: {
                    avatar: '',
                    phonenumber: '',
                    password: '',
                    repass: '',
                    email: '',
                    report: {
                        sms: false,
                        telegram: false,
                        email: false
                    }
                }
//                price: '',

            }
        },
        mounted() {
            console.log(this.x_data);
            this.type = this.x_data.type;
            this.csrf = this.csrf_field;
            this.fee = this.x_data.fee;
            this.internalTransURL = window.customURLs.internalTransURL;
        },
        methods: {
            send_new_info() {
              window.axios.post('http://localhost:8888/profile/change-info', this.new_info, {
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
            },

        }
    }
</script>