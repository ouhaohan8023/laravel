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
            <el-menu-item index="1">OHHINK</el-menu-item>
            <el-menu-item v-if="ok" index="2">注册</el-menu-item>
            <el-menu-item v-if="ok" index="3">登陆</el-menu-item>
            <el-submenu
                    index="2">
                <template slot="title">{{userName}}</template>
                <el-menu-item index="2-1">选项1</el-menu-item>
                <el-menu-item index="2-2">选项2</el-menu-item>
                <a :href="logOutUrl"><el-menu-item index="2-3" >退出</el-menu-item></a>
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
    }
    .el-menu--horizontal>.el-submenu{
        float: right;
    }
</style>
<script>
    console.log(logOutUrl);
    export default {
        data() {
            return {
                activeIndex: '1',
                activeIndex2: '1',
                userName: userName,
                logOutUrl: logOutUrl,
                isLogin: false
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>