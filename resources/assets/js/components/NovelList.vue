<!--展示所有文章-->
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
              <i class="el-icon-star-off ic_icon">{{o.n_love}}</i>
              <i class="el-icon-view ic_icon icon_right">{{o.n_read}}</i>
              <!--<div style="float: right; padding: 3px 0">点赞数:{{o.n_love}}</div>-->
              <!--<div style="float: right; padding: 3px 0">阅读量:{{o.n_read}}&nbsp;&nbsp;</div>-->
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
  /*!* 可以设置不同的进入和离开动画 *!*/
  /*!* 设置持续时间和动画函数 *!*/
  /*.slide-fade-enter-active {*/
    /*transition: all .3s ease;*/
  /*}*/
  /*.slide-fade-leave-active {*/
    /*transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);*/
  /*}*/
  /*.slide-fade-enter, .slide-fade-leave-to*/
    /*!* .slide-fade-leave-active for below version 2.1.8 *! {*/
    /*transform: translateX(10px);*/
    /*opacity: 0;*/
  /*}*/
  .NovelList .svgicon {
    width: 30px;height: 30px;
    vertical-align: -0.15em;
    fill: currentColor;
    overflow: hidden;
  }
  .NovelList .ic_icon{
    float: right;
    padding: 3px 0
  }
  .NovelList .icon_right {
    margin-right: 10px;
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
              show: true
            }
        },
        mounted(){
          this.$http.get('/novel_list?id=2').then((response) => {
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
