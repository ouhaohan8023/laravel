<template>
  <div class="container">
    <section>
      <!--<el-button type="text" @click="dialogVisible = true">点击打开 Dialog</el-button>-->
      <div v-for="o in 4" :key="o" class="text item">
        <a @click="dialogVisible = true" class="a-box-card">
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
</template>
<style>
  .item{
    margin-bottom: 15px;
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
