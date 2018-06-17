<!--首页左边栏，菜单-->
<template>
    <div class="container">
        <el-row class="tac">
            <el-col :span="24">
                <el-menu
                  :default-active="defaultactive"
                  class="el-menu-vertical-demo"
                  @open="handleOpen"
                  @close="handleClose"
                  background-color="#545c64"
                  text-color="#fff"
                  active-text-color="#ffd04b"
                >
                    <el-submenu index="1">
                        <template slot="title">
                            <i class="el-icon-more"></i>
                            <span>程序相关</span>
                        </template>
                        <el-menu-item-group>
                            <a @click="ToList(0)"><el-menu-item index="1-4">全部</el-menu-item></a>
                            <a v-for="item in menu1" @click="ToList(item.c_id)"><el-menu-item :index=item.c_router>{{item.c_name}}</el-menu-item></a>
                        </el-menu-item-group>
                    </el-submenu>
                    <el-submenu index="2">
                        <template slot="title">
                            <i class="el-icon-more"></i>
                            <span>浮生杂谈</span>
                        </template>
                        <el-menu-item-group>
                            <a v-for="item2 in menu2" @click="ToList(item2.c_id)"><el-menu-item :index=item2.c_router>{{item2.c_name}}</el-menu-item></a>
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
    .el-menu-vertical-demo a {
        text-decoration: none;
        color: rgb(255, 255, 255);
    }

</style>
<script>
    export default {
        props:['menu1','menu2','defaultactive'],
        data() {
            return {
//                isCollapse: isCollapse,
//                ShowTitle: ShowTitle,
            }
        },
        methods: {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            },
            ToList(data) {
//                console.log(data)
                // 命名的路由
                if(data == 0){
                    this.$router.push({ name: 'NovelList'})
                }else{
                    this.$router.push({ name: 'NovelList2', params: { id: data }})
                }
//                this.$router.go(0)
            }
        },


    }
</script>