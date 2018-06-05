<!--头部导航-->
<template>
    <div class="footer">
        <el-row>
            <el-col :span="6">
                <svg-icon id="icon-hippo"></svg-icon>
            </el-col>
            <el-col id="word" :span="6" :offset="12">Powered by <a href="https://www.ohh.ink">Oscar</a></el-col>
        </el-row>
    </div>
</template>
<style>
    .footer .svgicon {
        margin-top: 15px;
        width: 30px;
        height: 30px;
        vertical-align: -0.15em;
        fill: currentColor;
        overflow: hidden;
    }
    #word{
        line-height: 60px;
        text-align: right;
    }
</style>
<script>
    export default {
        data() {
            return {

            };
        },
        methods: {

        }
    }
</script>