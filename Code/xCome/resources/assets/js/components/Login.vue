<!--<template>-->
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<div class="col-md-8 col-md-offset-2">-->
                <!--<form v-model="action" method="post" novalidate>-->
                    <!--<input type="hidden" name="_token" v-model="csrf"><br/>-->
                    <!--<input id="password" type="password" name="password" placeholder="password"><br>-->
                    <!--<input id="username" type="text" name="username" placeholder="Username"><br>-->
                    <!--<input id="login" type="submit" value="Login">-->
                <!--</form>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</template>-->

<template>
    <div class="text-center" style="padding:50px 0">
        <div class="logo">login</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" v-model="action" method="post" novalidate class="text-left">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div>
                            <input type="hidden" name="_token" v-model="csrf">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" >
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <!--<div class="form-group login-group-checkbox">-->
                            <!--<input type="checkbox" id="remember" name="remember">-->
                            <!--<label for="remember">remember</label>-->
                        <!--</div>-->
                    </div>
                    <button id="submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>forgot your password? <a id="forget" href="/forget">click here</a></p>
                    <p>new user? <a v-bind:href="this.registerURL">create new account</a></p>
                </div>
            </form>
        </div>

        <!-- end:Main Form -->
    </div>
</template>



<script>

   export default {
       name: 'login',
       props: ['csrf_field', 'url'],
       data(){
           return {
               csrf: '',
               password: 'testtest',
               username: 'test',
               captcha: '',
               action: '',
               registerURL: ''

           }
       },
       mounted() {
//           alert('hmm')
           this.csrf = this.csrf_field;
//           window.Laravel = {
//               csrfToken: this.csrf_field,
//           };
           console.log(this.csrf_field);
           console.log(this.url);
           this.action = window.customURLs.login;
           this.registerURL = window.customURLs.register;
       },
       methods: {

           //           login() {
////               window.axios.get('localhost:8888/api/login').then(respond =>{
////                   alert(respond.getAllResponseHeaders())
////               alert(document.cookie)
//                   window.axios.put('localhost:8888/api/login', {
//                       username: this.username,
//                       password: this.password,
//                   },
//                       {
//                           headers: {
//                               'cookie': document.cookie
//                           }
//                       }).then(respond => {
//                           console.log(respond)
//                   }).catch(e => {
//                       alert(e)
//                   })
//               }
//                   alert(e)
//               })

       }
   }

</script>