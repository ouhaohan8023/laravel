
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 //require('./bootstrap');

window.Vue = require('vue');
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueRouter from 'vue-router';
//import VueResource from 'vue-resource';
import '../font/iconfont.js';
import axios from 'axios';
import 'element-ui/lib/theme-chalk/display.css';
// fade/zoom 等
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(ElementUI);
Vue.use(VueRouter);
//Vue.use(VueResource);

Vue.component('headbar', require('./components/Header.vue'));
Vue.component('side', require('./components/Side.vue'));
// Vue.component('breadcrumb', require('./components/Breadcrumb.vue'));
Vue.component('novel', require('./components/Novel.vue'));
Vue.component('novellist', require('./components/NovelList.vue'));
Vue.component('novellist2', require('./components/NovelList_List.vue'));
Vue.component('SvgIcon', require('./components/Svg.vue'));
Vue.component('footers', require('./components/Footer.vue'));
Vue.component('advertise', require('./components/Advertise.vue'));


import routes from './routes'
const router = new VueRouter({
    routes
})

Vue.prototype.$http = axios;

const app = new Vue({
    el: '#app',
    router,
    data:{
        message:'sdfs',
    }
});
