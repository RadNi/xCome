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
    <div class="hm-gradient">
        <div class="card-wrapper">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Login</h3>
                    <form v-model="action" method="post" novalidate>
                        <div>
                            <input type="hidden" name="_token" v-model="csrf">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="username" name="username" class="form-control">
                            <label for="username">Your Username</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="password" class="form-control" name="password">
                            <label for="password">Your password</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-default waves-effect waves-light">login</button>
                            <button class="btn btn-default waves-effect waves-light">forget my password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
               action: ''

           }

       },
       mounted() {
//           alert('hmm')
           this.csrf = this.csrf_field
//           window.Laravel = {
//               csrfToken: this.csrf_field,
//           };
           console.log(this.csrf_field);
           console.log(this.url);
           this.action = this.url;
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