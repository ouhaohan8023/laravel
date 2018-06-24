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
            </div>
            {{o.n_overview}}
          </el-card>
        </a>
      </div>
      <el-card class="el-card-loading" v-html="last_card_text">
      </el-card>
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
  .el-card-loading {
    text-align: center;
  }
  .NovelList a {
    color: #303133;
  }
  .NovelList a:hover {
    color: #000000;
    font-size: 16px;
    font-weight: bolder;
  }
  .NovelList .el-card {
    color: inherit;
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
              show: true,
              novel_list_page:1,
              allow_to_load:1,
              last_card_text: "客官，请稍等，拼命加载中！<i class='el-icon-loading'></i>"
            }
        },
        mounted(){
          this.getNovelList();
          var _this = this;
          window.onscroll = function() {
            //为了保证兼容性，这里取两个值，哪个有值取哪一个
            //scrollTop就是触发滚轮事件时滚轮的高度
            var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            var total_area = document.getElementById('app').clientHeight;
            var able_area = document.documentElement.clientHeight
            if(able_area + scrollTop >= total_area){
//              console.log('到了最底部999');
              if(_this.allow_to_load){
                _this.allow_to_load = 0;
                _this.getNovelList();
              }
            }
          }
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
          getNovelList() {
            var page = this.novel_list_page;
            this.$http.get('/novel_list?id=2&page='+page).then((response) => {
              return response.data
            }).then((result) => {
              var addData = result.novel.data;
              if(addData.length == 0){
//                console.log('孔');
                this.last_card_text = '客官，我是有底线的~~~    end'
              }else if(addData.length < 5){
                this.list = this.list.concat(addData);
                this.last_card_text = '客官，我是有底线的~~~    end'
              }
              else{
//                console.log('返回数据结果：', result)
                this.list = this.list.concat(addData);
                this.novel_list_page++;
                this.allow_to_load = 1;
//                console.log(this.novel_list_page)
              }
          });
          }
        }
    }

</script>
