<!--个人中心，左边栏-->
<template>
    <div class="container">
        <el-row class="tac">
            <el-col :span="24">
                <el-menu
                  default-active="1-3"
                  class="el-menu-vertical-demo"
                  @open="handleOpen"
                  @close="handleClose"
                  @select="handleSelect"
                  background-color="#545c64"
                  text-color="#fff"
                  active-text-color="#ffd04b"
                  :collapse="isCollapse"
                >
                    <el-submenu v-for="(a,ak) in menu" :key="ak" :index="a.m_routers">
                        <template slot="title">
                            <i class="el-icon-location"></i>
                            <span>{{a.m_name}}</span>
                        </template>
                        <el-menu-item-group>
                            <template slot="title" v-if="ShowTitle">{{a.m_name}}</template>
                            <router-link v-for="(b,bk) in a.m_pid" :key="bk" :to=b.m_route><el-menu-item :index=b.m_routers>{{b.m_name}}</el-menu-item></router-link>
                        </el-menu-item-group>
                    </el-submenu>
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
        props:['menu'],
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