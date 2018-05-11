
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(ElementUI);
Vue.use(VueRouter);
Vue.use(VueResource);

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('hello', require('./components/Hello.vue'));
Vue.component('headbar', require('./components/Header.vue'));
Vue.component('side', require('./components/Side.vue'));
Vue.component('breadcrumb', require('./components/Breadcrumb.vue'));
Vue.component('novel', require('./components/Novel.vue'));
Vue.component('novellist', require('./components/NovelList.vue'));

import routes from './routes'
const router = new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    router,
    data:{
        message:'sdfs',
    }
});
