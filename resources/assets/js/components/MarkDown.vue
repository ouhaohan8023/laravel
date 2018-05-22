<template>
    <div class="container">
        <el-row>
            <el-col :span="24">
                <div id="test-editormd">
                    <textarea id="markdown-textarea" class="editormd-markdown-textarea" name="test-editormd-markdown-textarea" style="display:none;"></textarea>
                    <textarea id="html-code"  class="editormd-html-textarea" name="test-editormd-html-code" style="display:none;"></textarea>
                </div>
            </el-col>
        </el-row>
        <el-row>
            <el-button type="primary" plain v-on:click="getValue">主要按钮</el-button>
        </el-row>
    </div>
</template>

<style>

</style>
<script>
    export default {
//        props:['isCollapse'];
        data() {
            return {
                isCollapse: isCollapse,
                ShowTitle: ShowTitle
            }
        },
        methods: {
            getValue() {
                var markdowntextarea = $('#markdown-textarea').html();
                var htmlcode = $('#html-code').text();
                console.log('text:'+markdowntextarea);
                console.log('html:'+htmlcode);
            }
        }
    }
    //markdown
//    var testEditor = editormd("test-editormd", {
//        //        width  : "90%",
//        //        height : 640,
//        //        path   : "../lib/",
//        theme : "dark",
//        previewTheme : "dark",
//        editorTheme : "pastel-on-dark",
//        saveHTMLToTextarea : true
//    });
</script>