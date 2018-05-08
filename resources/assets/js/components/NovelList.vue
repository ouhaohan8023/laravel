<template>
  <!--<transition name="slide-fade" mode="out-in">-->
  <div class="container">
    <section>
      <!--<el-button type="text" @click="dialogVisible = true">点击打开 Dialog</el-button>-->
      <div v-for="o in 4" :key="o" class="text item">
        <a @click="ToNovel(o)" class="a-box-card">
          <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
              <span>{{title}}</span>
              <el-button style="float: right; padding: 3px 0" type="text">操作按钮</el-button>
            </div>
            {{o+'.'+content }}
          </el-card>
        </a>
      </div>
      <el-dialog
              title="提示"
              :visible.sync="dialogVisible"
              width="30%"
              :before-close="handleClose">
        <span>这是一段信息</span>
        <span slot="footer" class="dialog-footer">
    <el-button @click="dialogVisible = false">取 消</el-button>
    <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
  </span>
      </el-dialog>

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
                title: '父组件向子组件传递数据',
                content: '在 Vue 中，可以使用 props 向子组件传递数据。',
                dialogVisible: false
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
            handleClose(done) {
                this.$confirm('确认关闭？')
                    .then(_ => {
                    done();
            })
            .catch(_ => {});
            }
        }


    }
</script>
