require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';

Vue.use(VueRouter);

Vue.component("employee-index", require('./pages/employee/Index.vue').default);

import { routes } from './routes';

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
});
