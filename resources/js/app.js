require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from './components/HomeComponent.vue';
import Portfolio from './components/PortfolioComponent.vue';
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/portfolio',
        component: Portfolio
    },
];

const router = new VueRouter({
    scrollBehavior: function(to, from, savedPosition) {
        if (to.hash) {
            return {
                selector: to.hash,
                behavior: 'smooth'
            }
        } else {
            return { x: 0, y: 0 }
        }
    },
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router
});
