<template>
  <!--<transition name="slide-fade" mode="out-in">-->
  <div class="NovelList">
    <section>
      <!--<el-button type="text" @click="dialogVisible = true">点击打开 Dialog</el-button>-->
      <div v-for="o in list" :key="o.n_id" class="text item">
        <a @click="ToNovel(o.n_id)" class="a-box-card">
          <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
              <span>{{o.n_mainname}}</span>
              <el-button style="float: right; padding: 3px 0" type="text">操作按钮</el-button>
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
</style>
<script>
    export default {
        data() {
            return {
              list: [],
              title: '父组件向子组件传递数据',
              content: '在 Vue 中，可以使用 props 向子组件传递数据。',
              dialogVisible: false
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
        }


    }
</script>
