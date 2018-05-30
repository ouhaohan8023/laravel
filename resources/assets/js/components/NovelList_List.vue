<!--按照分类展示文章列表-->
<template>
  <!--<transition name="slide-fade" mode="out-in">-->
  <div class="NovelList">
    <section>
      <!--<el-button type="text" @click="dialogVisible = true">点击打开 Dialog</el-button>-->
      <div v-for="o in list" :key="o.n_id" class="text item">
        <a @click="ToNovel(o.n_id)" class="a-box-card">
          <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
              <span><svg-icon :id="o.ic_icon"></svg-icon>{{o.n_mainname}}</span>
              <!--<el-button style="float: right; padding: 3px 0" type="text">操作按钮</el-button>-->
            </div>
            {{o.n_overview}}
          </el-card>
        </a>
      </div>
    </section>
  </div>
  <!--</transition>-->

</template>
<style>
  .item{
    margin-bottom: 15px;
  }
  /* 可以设置不同的进入和离开动画 */
  /* 设置持续时间和动画函数 */
  .slide-fade-enter-active {
    transition: all .3s ease;
  }
  .slide-fade-leave-active {
    transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
  }
  .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active for below version 2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
  }
  .svgicon {
    width: 30px;height: 30px;
    vertical-align: -0.15em;
    fill: currentColor;
    overflow: hidden;
  }
</style>
<script>
    export default {
        data() {
            return {
              list: [],
              title: '父组件向子组件传递数据',
              content: '在 Vue 中，可以使用 props 向子组件传递数据。',
              dialogVisible: false,
              current_nid:0
            }
        },
        mounted(){
          this.current_nid = this.$route.params.id;
          this.LoadData(this.current_nid);
////          console.log(this.current_nid);
////          if(this.current_nid != 0){
//            Vue.resource('/novel_list2?id='+this.current_nid).get().then((response) => {
//              //							console.log(response)
//              return response.data
//            }).then((result) => {
//              this.list = this.list.concat(result.novel);
//              console.log('返回数据结果：', result)
//            });
////          }
        },
        methods: {
            LinkTo: function (event) {
                alert("Hello")
            },
            ToNovel: function (data) {
                console.log(data)
                // 命名的路由
                this.$router.push('/novel?id='+data)
            },
            getStatus (urlStr) {
              var urlStrArr = urlStr.split('/')
              return urlStrArr[urlStrArr.length - 1]
            },
            LoadData(data) {
              Vue.resource('/novel_list2?id='+data).get().then((response) => {
                return response.data
              }).then((result) => {
                this.list = this.list.concat(result.novel);
                console.log('返回数据结果：', result)
              });
            }
        },
        watch: {
          '$route' (to, from) {
  //                console.log(this.getStatus(this.$route.path))
            var data = this.getStatus(this.$route.path)
            console.log('path:'+data);
            this.list = [];
            this.LoadData(data);
//          }
          }
        }


    }
</script>
