<!--我的文章列表，展示当前用户的文章-->
<template>
  <!--<transition name="slide-fade" mode="out-in">-->
  <div class="NovelList">
    <section>
      <div v-for="o in list" :key="o.n_id" class="text item">
          <el-card class="box-card" shadow="hover">
            <div slot="header" class="clearfix">
              <a @click="ToNovel(o.n_id)" class="a-box-card">
              <span><svg-icon :id="o.ic_icon"></svg-icon>{{o.n_mainname}}</span>
              </a>
              <el-button style="float: right; padding: 3px 0" type="text">
                <i class="el-icon-edit" @click="Edit(o.n_id)"></i>
                <i class="el-icon-share"></i>
                <i class="el-icon-delete"></i></el-button>
            </div>
            <a @click="ToNovel(o.n_id)" class="a-box-card">
            {{o.n_overview}}
            </a>
          </el-card>
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
  a{
    color: inherit;;
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
            }
        },
        mounted(){
//          console.log(userId);
          Vue.resource('/novel_list_own').get().then((response) => {
  //							console.log(response)
            return response.data
          }).then((result) => {
//            this.loading = false;
            this.list = this.list.concat(result.novel);
          console.log('返回数据结果：', result)
        });
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
            Edit(data){
              this.$router.push('/markDownEdit/'+data);
            }
        }


    }
</script>
