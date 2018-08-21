
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('wallets', require('./components/Wallets.vue'));
Vue.component('scroll_left', require('./components/Scroll_left.vue'));
Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('apply_payment', require('./components/Apply_Payment.vue'));
Vue.component('exam_reg', require('./components/Exam_Registeration.vue'));
Vue.component('foreign_reg', require('./components/Foreign_Payment.vue'));
Vue.component('internal_transaction', require('./components/Internal_Transaction.vue'));
Vue.component('user_information', require('./components/User_Information.vue'));
Vue.component('transaction_history', require('./components/Transaction_History.vue'));
Vue.component('account_div', require('./components/Account_Div.vue'));

const app = new Vue({
    el: '#app'
});
