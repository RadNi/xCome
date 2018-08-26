<template>
    <div class="container">
        <!--<div class="row">-->
            <!--<div class="col-md-8 col-md-offset-2">-->

                    <!--<table id="user-info-table">-->
                        <!--<td >-->
                            <!--<input id="phonenumber" name="phonenumber" placeholder="Phone Number" v-model="new_info.phonenumber">-->
                        <!--</td>-->
                        <!--<td >-->
                            <!--<p id="pid" name="pid">{{ x_data.info.national_id }}</p>-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<input id="avatar" name="avatar" placeholder="Avatar" v-model="new_info.avatar">-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<input id="password" type="password" name="password" placeholder="Password" v-model="new_info.password">-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<input id="ret-password" type="password" name="ret-password" placeholder="Repeat new password" v-model="new_info.repass">-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<p id="name" name="name" >{{ x_data.info.name }}</p>-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<p id="family" name="family">{{ x_data.info.family_name }}</p>-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<input id="email" name="email" placeholder="email" type="email" v-model="new_info.email">-->
                        <!--</td>-->

                        <!--<td >-->
                            <!--<div id="reportMethod">-->
                                <!--Choose Report method:<br>-->
                                <!--SMS <input id="smsReport" class="report" name="sms" type="checkbox" v-model="new_info.report.sms" v-on:change="new_info.report.sms = !new_info.report.sms">-->
                                <!--Telegram <input id="tgReport" class="report" name="tg"  type="checkbox" v-model="new_info.report.telegram" v-on:change="new_info.report.telegram = !new_info.report.telegram">-->
                                <!--Email <input id="emailReport" class="report" name="email" type="checkbox" v-model="new_info.report.email" v-on:change="new_info.report.email = !new_info.report.email">-->
                            <!--</div>-->
                        <!--</td>-->
                    <!--</table>-->
                    <!--<button id="change" v-on:click="send_new_info()">Change</button>-->

        <form>
            <div class="form-group row">
                <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                            placeholder="Phone Number" v-model="new_info.phonenumber">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">National ID</label>
                <label class="col-sm-2 col-form-label" id="pid">{{x_data.info.national_id}}</label>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password"
                           placeholder="Password" v-model="new_info.password">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password Confirmation</label>
                <div class="col-sm-10">
                    <input type="password" name="ret-password" class="form-control" id="ret-password"
                           placeholder="Password Confirmation" v-model="new_info.repass">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <label class="col-sm-2 col-form-label" id="name">{{x_data.info.name}}</label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Family Name</label>
                <label class="col-sm-2 col-form-label" id="family">{{x_data.info.family_name}}</label>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Email" v-model="new_info.email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Report Method</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="report" type="checkbox" id="smsReport" name="sms_report"
                            v-model="new_info.report.sms" v-on:change="new_info.report.sms = !new_info.report.sms">
                        <label class="form-check-label" for="smsReport">
                            SMS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="report" type="checkbox" id="tgReport" name="tg_report"
                               v-model="new_info.report.telegram" v-on:change="new_info.report.telegram = !new_info.report.telegram">
                        <label class="form-check-label" for="tgReport">
                            Telegram
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="report" type="checkbox" id="emailReport" name="email_report"
                               v-model="new_info.report.email" v-on:change="new_info.report.email = !new_info.report.email">
                        <label class="form-check-label" for="emailReport">
                            Email
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button id="change" class="btn btn-outline-secondary" v-on:click="send_new_info()">Change</button>
                </div>
            </div>
        </form>
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
              window.axios.post(window.customURLs.changeInfo, this.new_info, {
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