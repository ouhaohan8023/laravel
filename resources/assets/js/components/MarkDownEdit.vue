<!--MD编辑器-->
<template>
	<div class="container">
		<el-row>
			<el-col :span="24">
				<div style="text-align: center;margin-bottom: 10px">
					<el-input v-model="input5" class="input-with-select input-ohh" style="width: 95%">
						<el-select v-model="select" slot="prepend" placeholder="请选择">
							<el-option label="原创" value="1"></el-option>
							<el-option label="转载" value="2"></el-option>
							<el-option label="翻译" value="3"></el-option>
						</el-select>
					</el-input>
				</div>
			</el-col>
		</el-row>

		<el-row>
			<el-col :span="24">
				<el-col :span="12">
					<textarea>
					{{mdInput}}
					</textarea>
				</el-col>
				<el-col id="test-editormd" :span="12">
					<!--<textarea id="markdown-textarea" class="editormd-markdown-textarea" name="test-editormd-markdown-textarea"-->
										<!--style="display:none;">{{mdInput}}</textarea>-->
					<!--<textarea id="html-code" class="editormd-html-textarea" name="test-editormd-html-code"-->
										<!--style="display:none;"></textarea>-->
				</el-col>
			</el-col>
		</el-row>
		<el-row>
			<span class="el-checkbox__label novelClassify">文章分类</span>
			<el-cascader
				:options="options"
				v-model="selectedOptions3"
			></el-cascader>
		</el-row>
		<el-row style="padding-left: 15px;padding-right: 15px;margin-top: 10px;">
			<el-checkbox-group v-model="checkList">
				<el-col :span="6" v-for="item in items" :key="item.t_id">
					<el-checkbox :label="item.t_id">{{item.t_name}}</el-checkbox>
				</el-col>
			</el-checkbox-group>
		</el-row>
		<el-row class="footerBtn">
			<el-button type="primary" plain v-on:click="getValue">发布</el-button>
		</el-row>
	</div>
</template>

<style>
	.footerBtn {
		text-align: right;
		padding-right: 20px;
	}

	.el-select .el-input {
		width: 130px;
	}

	.input-with-select .el-input-group__prepend {
		background-color: #fff;
	}

	.el-input-group__prepend div.el-select .el-input__inner {
		color: #999999;
		background-color: #2c2827;
	}

	.input-ohh .el-input__inner {
		color: #999999;
		background-color: #2c2827;
	}

	.el-input-group__prepend div.el-select:hover .el-input__inner {
		color: #999999;
		background-color: #2c2827;
	}

	.el-checkbox__input.is-checked .el-checkbox__inner {
		background-color: #2c2827;
		border-color: #2c2827;
	}

	.novelClassify {
		color: #606266;
	}
</style>
<script>
	export default {
//        props:['isCollapse'];
		data() {
			return {
				isCollapse: isCollapse,
				ShowTitle: ShowTitle,
				input5: '',
				select: '1',
				checkList: [],
				checkListStr: '',
				items: [],
				options: [
					{
						value: '1',
						label: '程序相关',
						children: [{
							value: '2',
							label: 'PHP',
						}]
					},
					{
						value: '3',
						label: '浮生杂谈',
						children: [{
							value: '4',
							label: '2018年6月',
						}]
					}],
				selectedOptions3: ['3', '4'],
				mdInput: '###看看111',
				current_nid:'',
				maintitle:'',

			}
		},
		create(){

		},
		mounted(){
			this.current_nid = this.$route.query.id;
			console.log(this.current_nid)
			this.Edit(this.current_nid);
		},
		methods: {
			getValue() {
				var markdowntextarea = $('#markdown-textarea').html();
				var htmlcode = $('#html-code').text();
//				console.log('text:' + markdowntextarea);
//				console.log('html:' + htmlcode);
//				console.log('title:' + this.input5);
//				console.log('level:' + this.select);
//        console.log(this.checkList)
				this.checkListStr = '';
				for (var i = 0; i < (this.checkList.length); i++) {
					this.checkListStr = this.checkListStr + this.checkList[i] + ',';
				}
//				console.log(this.checkListStr);

				Vue.http.post('/saveNovel', {
					md: markdowntextarea,
					html: htmlcode,
					title: this.input5,
					level: this.select,
					tags: this.checkListStr,
					classify: this.selectedOptions3,
					type: this.select
				}).then((response) => {
					//							console.log(response)
					return response.data
				}
			).
				then((result) => {
					if(result.code == 200){
					//成功
					this.openSuccess('您的文章发送成功！');
					}else{
					//失败
//					this.open('您的文章发送失败！');
				}
			});
			},
			openSuccess(msg) {
				this.$alert(msg, '提示', {
						confirmButtonText: '确定',
						callback: action => {
							this.$router.push('/myBlog');
						}
			});
			},
			Edit(data) {
				Vue.resource('/novel_detail?id='+data).get().then((response) => {
					return response.data
				}).then((result) => {
//				console.log('名字:'+result.novel.name);
				this.input5 = result.novel.n_mainname;
				this.mdInput = result.novel.n_md;
				console.log(this.mdInput);
				$('#markdown-textarea').html(this.mdInput);
				testEditormdView = editormd.markdownToHTML("test-editormd", {
					markdown        : this.mdInput ,//+ "\r\n" + $("#append-test").text(),
					//htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
					htmlDecode      : "style,script,iframe",  // you can filter tags decode
					//toc             : false,
					tocm            : true,    // Using [TOCM]
					//tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
					//gfm             : false,
					//tocDropdown     : true,
					// markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
					emoji           : true,
					taskList        : true,
					tex             : true,  // 默认不解析
					flowChart       : true,  // 默认不解析
					sequenceDiagram : true,  // 默认不解析
				});
			});
			}
		}
	}
</script>