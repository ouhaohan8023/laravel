<!--MD编辑器-->
<template>
	<div id="editor">
		<el-row>
			<el-col :span="24">
				<div style="text-align: center;margin-bottom: 10px">
					<el-input placeholder="请输入内容" v-model="input5" class="input-with-select input-ohh" style="width: 95%">
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
				<div style="text-align: center;margin-bottom: 10px">
					<el-input
						class="input-ohh"
						type="textarea"
						autosize
						placeholder="请用一两句话概括本篇文章，用于文章简述"
						v-model="textarea2"
						style="width: 95%;">
					</el-input>
				</div>
			</el-col>
		</el-row>

		<mavon-editor style="height: 100%" v-model="markdowntextarea" @change="editorChange"></mavon-editor>

		<el-row style="margin-top: 10px">
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
	#editor {
		margin: auto;
		width: 100%;
		height: 100%;
		z-index: -1;
	}
</style>
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
	.el-textarea__inner{
		background-color:#2c2827 ;
	}
</style>
<script>
	// Local Registration
	import { mavonEditor } from 'mavon-editor'
	import 'mavon-editor/dist/css/index.css'
	export default {
		name: 'editor',
		components: {
			mavonEditor
			// or 'mavon-editor': mavonEditor
		},
		data() {
			return {
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
				textarea2: '',
				htmlcode: '',
				markdowntextarea: '',
				current_nid: '',
				loading: true
		}
		},
		mounted(){
			//tags
			Vue.resource('/getLabel').get().then((response) => {
				return response.data
			}).then((result) => {
				console.log('标签结果：', result)
				this.items = this.items.concat(result);
			});
			//文章内容
			this.current_nid = this.$route.query.id;
			Vue.resource('/novel_detail?id='+this.current_nid).get().then((response) => {
				//							console.log(response)
				return response.data
			}).then((result) => {
//				console.log('名字:'+result.novel.name);
			this.loading = false;
			this.input5 = result.novel.n_mainname;
			this.select = result.novel.n_type;
			this.select = this.select.toString();
			var checkList = result.novel.n_tags;
			var checkListStr = checkList.split(',');
			checkListStr.forEach(function(e,index){
				checkListStr[index] = parseInt(e)
			});
			this.checkList = checkListStr;
			this.markdowntextarea = result.novel.n_md;
			this.htmlcode = result.novel.n_content;

			var one = result.novel.n_one
			var one = one.toString();
			var two = result.novel.n_two;
			var two = two.toString();
			this.selectedOptions3 = [one,two];
			console.log(this.selectedOptions3);
			this.textarea2 = result.novel.n_overview;
			console.log('返回数据结果:',result)
			});
		},
		methods: {
			editorChange (value, render) {
//				console.log('value: ' + value)
//				console.log('render: ' + render)
				this.htmlcode = render;
			},
			getValue() {
				this.checkListStr = '';
				this.checkListStr = this.checkList.join();

				Vue.http.put('/doMarkDownEdit/'+this.current_nid, {
					md: this.markdowntextarea,
					html: this.htmlcode,
					title: this.input5,
					level: this.select,
					tags: this.checkListStr,
					classify: this.selectedOptions3,
					type: this.select,
					text: this.textarea2
				}).then((response) => {
					//							console.log(response)
					return response.data
				}
			).
				then((result) => {
					if(result.code == 200){
					//成功
					this.openSuccess('您的文章修改成功！');
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
		}

	}
</script>