<!--个人中心，左边栏-->
<template>
    <div class="container">
        <el-row class="tac">
            <el-col :span="24">
                <el-menu
                  default-active="1-1"
                  class="el-menu-vertical-demo"
                  @open="handleOpen"
                  @close="handleClose"
                  @select="handleSelect"
                  background-color="#545c64"
                  text-color="#fff"
                  active-text-color="#ffd04b"
                  :collapse="isCollapse"
                >
                    <el-submenu index="1">
                        <template slot="title">
                            <i class="el-icon-location"></i>
                            <span>我的博客</span>
                        </template>
                        <el-menu-item-group>
                            <template slot="title" v-if="ShowTitle">我的博客</template>
                            <!--<router-link to="/markDown"><el-menu-item index="1-1">发表博客</el-menu-item></router-link>-->
                            <router-link to="/markDownVue"><el-menu-item index="1-2">发表博客</el-menu-item></router-link>
                            <router-link to="/myBlog"><el-menu-item index="1-3">博客列表</el-menu-item></router-link>
                        </el-menu-item-group>
                        <!--<el-menu-item-group title="分组2">-->
                            <!--<el-menu-item index="1-3">选项3</el-menu-item>-->
                        <!--</el-menu-item-group>-->
                        <!--<el-submenu index="1-4">-->
                            <!--<template slot="title">选项4</template>-->
                            <!--<el-menu-item index="1-4-1">选项1</el-menu-item>-->
                        <!--</el-submenu>-->
                    </el-submenu>
                    <el-submenu index="2">
                        <template slot="title">
                            <i class="el-icon-location"></i>
                            <span>系统设置</span>
                        </template>
                        <el-menu-item-group>
                            <template slot="title" v-if="ShowTitle">系统设置</template>
                            <router-link to="/"><el-menu-item index="2-1">常量设置</el-menu-item></router-link>
                            <router-link to="/tagController"><el-menu-item index="2-2">标签设置</el-menu-item></router-link>

                            <!--<router-link to="/"><el-menu-item index="1-2">选项二</el-menu-item></router-link>-->
                        </el-menu-item-group>
                    </el-submenu>
                    <!--<el-menu-item index="3" disabled>-->
                        <!--<i class="el-icon-document"></i>-->
                        <!--<span slot="title">导航三</span>-->
                    <!--</el-menu-item>-->
                    <!--<el-menu-item index="4">-->
                        <!--<i class="el-icon-setting"></i>-->
                        <!--<span slot="title">导航四</span>-->
                    <!--</el-menu-item>-->
                </el-menu>
            </el-col>
        </el-row>
    </div>
</template>

<style>

    .el-submenu .el-menu-item{
        min-width:0
    }
    a {
        text-decoration: none;
        color: rgb(255, 255, 255);
    }

</style>
<script>
    export default {
//        props:['isCollapse'];
        data() {
            return {
                isCollapse: isCollapse,
                ShowTitle: ShowTitle
            }
        },
        methods: {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            },
            handleSelect(key, keyPath) {
//                console.log(keyPath[1]);
//                if(keyPath[1] == '1-1'){
//                    location.reload();
//                }
            }
        }
    }
</script>