<!--标签-->
<template>
	<div id="tag">
		<el-tag
			:key="item.t_id"
			v-for="item in tagsList"
			closable
			:disable-transitions="false"
			@close="handleClose(item)">
			{{item.t_name}}
		</el-tag>
		<el-input
			class="input-new-tag"
			v-if="inputVisible"
			v-model="inputValue"
			ref="saveTagInput"
			size="small"
			@keyup.enter.native="handleInputConfirm"
			@blur="handleInputConfirm"
		>
		</el-input>
		<el-button v-else class="button-new-tag" size="small" @click="showInput">+ New Tag</el-button>
		<!--<el-tag type="info">标签三</el-tag>-->
		<!--<el-tag type="warning">标签四</el-tag>-->
		<!--<el-tag type="danger">标签五</el-tag>-->
	</div>
</template>

<style>
	.el-tag + .el-tag {
		margin-left: 10px;
	}
	.button-new-tag {
		margin-left: 10px;
		height: 32px;
		line-height: 30px;
		padding-top: 0;
		padding-bottom: 0;
	}
	.input-new-tag {
		width: 90px;
		margin-left: 10px;
		vertical-align: bottom;
	}
</style>

<script>

	export default {
		data () {
			return {
				tagsList: [],
				num: 0,
				inputVisible: false,
				inputValue: ''
			}
		},
		mounted(){
//			this.current_nid = this.$route.query.id;
//			Vue.resource('/sys/tagsController').get().then((response) => {
//				//							console.log(response)
//				return response.data
//			}).then((result) => {
//				console.log(result);
//			var list = result.list;
//			this.tagsList = list;
//			this.num = list.length;
//			console.log('数量:'+this.num);
//			this.uid = result.uid;
//		});
			this.$http.get('/sys/tagsController', {

				}).then((response) => {
//						console.log(response)
							return response.data
			}).then((result) => {
				console.log(result);
				var list = result.list;
				this.tagsList = list;
				this.num = list.length;
				console.log('数量:'+this.num);
				this.uid = result.uid;
			});

	},
		methods: {
			handleClose(tag) {
//				console.log(tag)
				this.tagsList.splice(this.tagsList.indexOf(tag), 1);
			},

			showInput() {
				this.inputVisible = true;
				this.$nextTick(_ => {
					this.$refs.saveTagInput.$refs.input.focus();
			});
			},

			handleInputConfirm() {
				let inputValue = this.inputValue;
				var data = {};
				data['t_id'] = ++this.num;
				console.log(data['t_id'])

				data['t_name'] = inputValue;
				data['t_u_id'] = this.uid;
				if (inputValue) {
					this.add(inputValue);
					this.tagsList.push(data);
				}
				this.inputVisible = false;
				this.inputValue = '';
				console.log(this.tagsList)
			},
			add(inputValue) {
				this.$http.post('/sys/tagsControllerAdd', {
					t_name: inputValue
				}).then((response) => {
												console.log(response)
//					return response.data
				})
			}
		}

	}
//	export default {
//		props: ['tagsList']
//	}
</script>