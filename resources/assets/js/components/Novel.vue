<!--文章详情展示-->
<template>
	<!--<transition name="bounce" mode="out-in">-->
	<div id="tags" class="container">
		<section
			v-loading="loading"
			element-loading-background="#efeeea"
		>
			<h2>{{maintitle}}</h2>
			<h1>{{subtitle}}</h1>
			<el-row class="time_read">
				<el-col :span="8">{{novelTime}}</el-col>
				<el-col :span="6" :offset="10" class="read">作者:{{writer}}&nbsp;&nbsp;阅读量:{{read}}</el-col>
				<el-col :span="8">{{changeTime}}</el-col>
			</el-row>
			<tag-el v-bind:tagsList="tagsList"></tag-el>
			<div class="content">
				<div class="" style="display: block;">
					<div class="markdown-body editormd-preview-container" previewcontainer="true" style="">
						<div v-html="contents"></div>
					</div>
				</div>
				<el-row class="reward">
					<!--<el-tag type="danger">已有<b>{{read}}</b>人阅读</el-tag>-->
					<el-button type="danger" round v-on:click="addLove" :disabled="love_btn">{{love_word}}</el-button>
					<el-tag type="danger">已有<b>{{love}}</b>人点赞</el-tag>
				</el-row>
			</div>
		</section>
	</div>
	<!--</transition>-->
</template>

<style>

	.page-component .content {
		padding-top: 50px;
	}
	.bounce-enter-active {
		animation: bounce-in .5s;
	}
	.bounce-leave-active {
		animation: bounce-in .5s reverse;
	}
	@keyframes bounce-in {
		0% {
			transform: scale(0);
		}
		50% {
			transform: scale(1.5);
		}
		100% {
			transform: scale(1);
		}
	}

	.time {
		font-size: 13px;
		color: #999;
	}

	.bottom {
		margin-top: 13px;
		line-height: 12px;
	}

	.button {
		padding: 0;
		float: right;
	}

	.image {
		width: 100%;
		display: block;
	}

	.clearfix:before,
	.clearfix:after {
		display: table;
		content: "";
	}

	.clearfix:after {
		clear: both
	}
	.reward{
		text-align: center;
	}
	.time_read{
		font-size: 12px;
		color: #89a071;
		margin-bottom: 10px;
	}
	.read{
		text-align: right;
	}
	.content .editormd-preview-container{
		padding: 8px;
		color: inherit;
		background-color: inherit;
	}
</style>
<script>
		//局部注册
    import tag from './Tag.vue';
    export default {
        components: {
            'tag-el':tag
        },
        data () {
            return {
							loading: true,
							contents: '载入中ing',
							currentDate: new Date(),
							maintitle: '主标题',
							subtitle: '',
							tagsList: [],
							love: 0,
							read: 0,
							current_nid: 0,
							love_btn: false,
							love_word: '点个赞吧！让我知道你来过',
							novelTime: '',
							changeTime: '',
							writer: ''
						}
				},
        mounted(){
					this.current_nid = this.$route.query.id;
					this.$http.get('/novel_detail?id='+this.current_nid).then((response) => {
					//							console.log(response)
						return response.data
					}).then((result) => {
						console.log('名字:'+result.novel.name);
					this.writer = result.novel.name;
					this.loading = false;
						this.maintitle = result.novel.n_mainname;
						this.subtitle = result.novel.n_subtitle;
						this.contents = "<div>"+result.novel.n_content+"</div>";
						this.tagsList = this.tagsList.concat(result.tags);
						this.love = result.novel.n_love;
						this.read = result.novel.n_read;
						this.novelTime = "创建于:"+result.novel.n_buildtime;
						if(result.novel.n_buildtime != result.novel.n_changetime){
							this.changeTime = "更新于:"+result.novel.n_changetime;
						}
						console.log('返回数据结果：', result)
					});
        },
			methods: {
				addLove: function (event) {
//					console.log(this.current_nid);
					this.love = this.love + 1;
					this.$http.get('/novel_add_love?id='+this.current_nid).then((response)=>{
//						console.log(response)
						return response.data
					}).then((result) => {
						if(result == 1){
							this.love_btn = true
							this.love_word = '谢谢支持 ^_^ '
						}
				});
				}
			}

		}
</script>