import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './components/App.vue';
import Dashboard from './components/Dashboard.vue';
import Pages from './components/Pages.vue';

const routes = [
  {
    name: 'Dashboard',
    path: '/admin',
    component: Dashboard
  },
  {
    name: 'Pages',
    path: '/admin/pages',
    component: Pages
  }
];

const router = new VueRouter({
  mode: 'history',
  routes: routes,
});

Vue.use(VueAxios, axios);
new Vue(Vue.util.extend(
  { router }, App)
).$mount('#app');