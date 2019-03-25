
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueLocalStorage from 'vue-localstorage'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

require('./bootstrap');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('navbar', require('./components/Layouts/Navbar.vue'))


Vue.use(VueRouter);
Vue.use(VueLocalStorage);
Vue.use(BootstrapVue);

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: require('./components/Index.vue').default },
        { path: '/register', component: require('./components/Register.vue').default},
    ]
});

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
    localStorage: {
        register_id: {
            type: String,
        },
        register_first_name: {
            type: String
        },
        register_last_name: {
            type: String
        },
        register_email: {
            type: String
        },
    }
});
