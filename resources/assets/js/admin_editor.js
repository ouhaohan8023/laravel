
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
import '../font/iconfont.js';

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
Vue.component('sideadmin', require('./components/SideAdmin.vue'));
Vue.component('breadcrumb', require('./components/Breadcrumb.vue'));
Vue.component('novel', require('./components/Novel.vue'));
Vue.component('novellist', require('./components/NovelList_MyBlog.vue'));
Vue.component('SvgIcon', require('./components/Svg.vue'));

import routes from './routesadmin'
const router = new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    router,
    data:{
        message:'sdfs',
        options: [
            {
                value: '1',
                label: '程序相关',
                children: [{
                    value: '2',
                    label: 'PHP',
                }]
            },
            {
                value: '3',
                label: '浮生杂谈',
                children: [{
                    value: '4',
                    label: '2018年6月',
                }]
            }],
        selectedOptions3: ['3', '4'],
        input5: '',
        select: '1',
        checkList: [],
        checkListStr: '',
        items: [],
    },
    methods: {
        getValue() {
            var markdowntextarea = $('#markdown-textarea').html();
            var htmlcode = $('#html-code').text();
//				console.log('text:' + markdowntextarea);
//				console.log('html:' + htmlcode);
//				console.log('title:' + this.input5);
//				console.log('level:' + this.select);
//        console.log(this.checkList)
            this.checkListStr = '';
            for (var i = 0; i < (this.checkList.length); i++) {
                this.checkListStr = this.checkListStr + this.checkList[i] + ',';
            }
//				console.log(this.checkListStr);

            Vue.http.post('/saveNovel', {
                md: markdowntextarea,
                html: htmlcode,
                title: this.input5,
                level: this.select,
                tags: this.checkListStr,
                classify: this.selectedOptions3,
                type: this.select
            }).then((response) => {
                //							console.log(response)
                return response.data
            }
        ).
            then((result) => {
                if(result.code == 200){
                //成功
                this.openSuccess('您的文章发送成功！');
            }else{
                //失败
//					this.open('您的文章发送失败！');
            }
        });
        },
        openSuccess(msg) {
            this.$alert(msg, '提示', {
                  confirmButtonText: '确定',
                  callback: action => {
                  this.$router.push('/myBlog');
        }
        });
        },
    }
});
