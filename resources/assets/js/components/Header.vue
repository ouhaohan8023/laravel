<!--头部导航-->
<template>
    <div class="container">
        <el-menu
          :default-active="activeIndex2"
          class="el-menu-demo"
          mode="horizontal"
          @select="handleSelect"
          background-color="#545c64"
          text-color="#fff"
          active-text-color="#ffd04b">
            <el-menu-item index="1">{{logo}}</el-menu-item>
            <!--<el-menu-item class="SignIn" v-if="isLogin" index="2"><a :href="RegisterUrl">注册</a></el-menu-item>-->
            <el-menu-item class="SignUp" v-if="isLogin" index="3"><a :href="LoginUrl">登陆</a></el-menu-item>
            <el-submenu
              index="4"
              v-if="!isLogin">
                <template slot="title">{{userName}}</template>
                <a :href="myBlog"><el-menu-item index="4-1">个人中心</el-menu-item></a>
                <el-menu-item index="4-2">选项2</el-menu-item>
                <a :href="logOutUrl"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><el-menu-item index="4-3" >退出</el-menu-item></a>
                <!--<el-submenu index="2-4">-->
                    <!--<template slot="title">选项4</template>-->
                    <!--<el-menu-item index="2-4-1">选项1</el-menu-item>-->
                    <!--<el-menu-item index="2-4-2">选项2</el-menu-item>-->
                    <!--<el-menu-item index="2-4-3">选项3</el-menu-item>-->
                <!--</el-submenu>-->
            </el-submenu>
            <!--<el-menu-item index="3" disabled>消息中心</el-menu-item>-->
            <!--<el-menu-item index="4"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>-->
        </el-menu>
    </div>
</template>
<style>
    .el-header{
        padding: 0;
        right:0;
    }
    .el-menu--horizontal>.el-submenu{
        float: right;
    }
    .el-menu--horizontal>.SignIn,.el-menu--horizontal>.SignUp{
        float: right;
    }
</style>
<script>
    console.log(logOutUrl);
    export default {
        data() {
            return {
                logo: Logo,
                activeIndex: '1',
                activeIndex2: '1',
                userName: userName,
                logOutUrl: logOutUrl,
                isLogin: isLogin,
                RegisterUrl: RegisterUrl,
                LoginUrl: LoginUrl,
                myBlog: '/admin'
            };
        },
        methods: {
            handleSelect(key, keyPath) {
//                console.log(key);
                if(key == 3){
                    window.location.href=LoginUrl;
                }
                if(key == 2){
                    window.location.href=RegisterUrl;
                }
                if(key == 1){
                    window.location.href='/';
                }
//                console.log(key, keyPath);
            },
        }
    }
</script>