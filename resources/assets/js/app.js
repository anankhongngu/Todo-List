require('./bootstrap');
window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Home from './views/Welcome'

// ~ admin

import Dashboard from './views/Board'
import Login from './views/Login'
import Register from './views/Register'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/board',
            name: 'board',
            component: Dashboard
        },
    ],
});

const app = new Vue({
    el: '#app',
	components: { App },
    router,
});
