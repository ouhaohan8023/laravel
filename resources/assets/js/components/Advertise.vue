<!--右边栏-->
<template>
  <div class="Advertise">
    <!--<div>-->
      <!--<a target="_blank" href="https://www.vultr.com/?ref=7384945"><img class="ca" src="https://www.vultr.com/media/banner_3.png"></a>-->
    <!--</div>-->
    <div class="right-tags">
      <div class="title">文章推荐</div>
      <el-row class="content">
        <div v-for="o in recommend" :key="o.n_id" class="text item">
          <a @click="ToNovel(o.n_id)" class="a-box-card">
            <el-card class="box-card recommend" >
                {{o.n_mainname }}
              <p><i class="el-icon-view">{{o.n_read}}</i><i class="el-icon-star-off right">{{o.n_love}}</i></p>
            </el-card>
          </a>
        </div>
      </el-row>
    </div>
  </div>
</template>
<style>
  .Advertise .ca {
    min-width: 150px;
    max-width: 100%;
    height: auto;
    display: block;
  }
  .Advertise .right-tags {
    margin-top: 20px;
    background-color: #ffffff;
  }
  .Advertise .right-tags .title {
    background-color: #535c63;
    height: 35px;
    line-height: 35px;
    font-size: 15px;
    color: #ffffff;
    font-weight: 700;
    padding-left: 20px;
  }
  .Advertise .right-tags .content {
    padding: 10px;
  }
  .el-card .recommend{
    font-size: 12px;
  }
  .el-card .right{
    margin-left: 20px;
  }
  .Advertise .el-card {
    color: inherit;
  }
  .Advertise a {
    color: #303133;
  }
  .Advertise a:hover {
    color: #00adb2;
    font-weight: bolder;
  }




</style>
<script>
    export default {
      props:['recommend'],
      data() {
            return {

            }
        },
        mounted(){

        },
        methods: {
          ToNovel: function (data) {
//            console.log(data)
            // 命名的路由
            this.$router.push('/novel?id='+data)
          },
        }
    }
</script>
