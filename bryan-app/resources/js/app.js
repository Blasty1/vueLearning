require('./bootstrap');

import Vue from 'vue'

Vue.component('register', require('./components/register.vue').default);
Vue.component('login', require('./components/login.vue').default);
Vue.component('chat', require('./components/chat.vue').default);
const app= new Vue({
    el : '#app'
})