<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form v-model="action" method="post" novalidate>
                    <input type="hidden" name="_token" v-model="csrf"><br/>
                    <input id="password" type="password" name="password" placeholder="password"><br>
                    <input id="username" type="text" name="username" placeholder="Username"><br>
                    <input id="login" type="submit" value="Login">
                </form>
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