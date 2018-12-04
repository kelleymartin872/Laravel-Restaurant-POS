/*jshint esversion: 6 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');

 import VueRouter from 'vue-router';
 Vue.use(VueRouter);

 import store from './stores/global-store';

 const manager = Vue.component('manager', require('./components/manager.vue'));
 const user = Vue.component('user', require('./components/user.vue'));
 const department = Vue.component('department', require('./components/departmentList.vue'));
 const waiter = Vue.component('waiter', require('./components/waiter'));
 const profile = Vue.component('profile', require('./components/profile.vue'));
 const login = Vue.component('login', require('./components/login.vue'));
 const logout = Vue.component('logout', require('./components/logout.vue'));

 const routes = [
 { path: '/', redirect: '/users', name: 'root'},
 { path: '/waiter', component: waiter, name: 'waiter'},
 { path: '/manager', component: manager, name: 'manager'},
 { path: '/users', component: user, name: 'users'},
 { path: '/departments', component: department, name: 'departments'},
 { path: '/profile', component: profile, name: 'profile'},
 { path: '/login', component: login, name: 'login'},
 { path: '/logout', component: logout, name: 'logout'},
 ];

 const router = new VueRouter({
  routes:routes
});

 router.beforeEach((to, from, next) => {
    if ((to.name == 'profile') || (to.name == 'logout')) {
        if (!store.state.user) {
            next("/login");
            return;
        }
    }
    next();
});

// Change the base URL to your REST API URL
// or leave undefined if it is the same URL
// as the site
//axios.defaults.baseURL = 'http://my.api';

const app = new Vue({
  router,
  data:{
    player1:undefined,
    player2: undefined,
},
store,
created() {
    console.log('-----');
    console.log(this.$store.state.user);
    // this.$store.commit('loadDepartments');
    this.$store.commit('loadTokenAndUserFromSession');
    console.log(this.$store.state.user);
}
}).$mount('#app');

