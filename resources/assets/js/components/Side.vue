<!--首页左边栏，菜单-->
<template>
    <div class="container">
        <el-row class="tac">
            <el-col :span="24">
                <el-menu
                  default-active="1-4"
                  class="el-menu-vertical-demo"
                  @open="handleOpen"
                  @close="handleClose"
                  background-color="#545c64"
                  text-color="#fff"
                  active-text-color="#ffd04b"
                  :collapse="isCollapse"
                >
                    <el-submenu index="1">
                        <template slot="title">
                            <i class="el-icon-more"></i>
                            <span>程序相关</span>
                        </template>
                        <el-menu-item-group>
                            <template slot="title" v-if="ShowTitle">程序相关</template>
                            <!--<router-link to="/"><el-menu-item index="1-1">PHP</el-menu-item></router-link>-->
                            <a @click="ToList(0)"><el-menu-item index="1-4">全部</el-menu-item></a>
                            <a @click="ToList(2)"><el-menu-item index="1-1">后端</el-menu-item></a>
                            <a @click="ToList(5)"><el-menu-item index="1-2">前端</el-menu-item></a>
                            <a @click="ToList(6)"><el-menu-item index="1-3">SSR</el-menu-item></a>
                            <!--<router-link to="/"><el-menu-item index="1-2">选项二</el-menu-item></router-link>-->
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
                            <i class="el-icon-more"></i>
                            <span>浮生杂谈</span>
                        </template>
                        <el-menu-item-group>
                            <template slot="title" v-if="ShowTitle">浮生杂谈</template>
                            <!--<router-link :to="{path:'/list',query: {lid: 4}}"><el-menu-item index="2-1">2018年</el-menu-item></router-link>-->
                            <a @click="ToList(4)"><el-menu-item index="2-1">2018年</el-menu-item></a>

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
    .el-menu-vertical-demo a {
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
                ShowTitle: ShowTitle,
                menu1: [],
                menu2: [],
            }
        },
        mounted(){
            this.$http.get('/novel_detail?id='+this.current_nid).then((response) => {
                //							console.log(response)
                return response.data
            }).then((result) => {
                console.log('名字:'+result.novel.name);
            this.writer = result.novel.name;
            this.loading = false;
            this.maintitle = result.novel.n_mainname;
            this.subtitle = result.novel.n_subtitle;
            this.contents = "<div>"+result.novel.n_content+"</div>";
            this.tagsList = this.tagsList.concat(result.tags);
            this.love = result.novel.n_love;
            this.read = result.novel.n_read;
            this.novelTime = "创建于:"+result.novel.n_buildtime;
            if(result.novel.n_buildtime != result.novel.n_changetime){
                this.changeTime = "更新于:"+result.novel.n_changetime;
            }
            console.log('返回数据结果：', result)
        });
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