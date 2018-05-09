<template>
	<!--<transition name="bounce" mode="out-in">-->
	<div id="tags" class="container">
		<section v-loading="loading">
			<h2>主标题</h2>
			<h1>副标题</h1>
			<tag-el></tag-el>
			<div class="content">
				<h4 v-html="contents"></h4>
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
                currentDate: new Date()
						}
				},
        mounted(){
            var id= this.$route.query.id
            Vue.resource('/laravel/public/novel_detail?id='+id).get().then((response) => {
                return response.text()
            }).then((result) => {
                this.loading = false;
                this.contents = "<el-row>\n" +
                    "  <el-col :span=\"8\" v-for=\"(o, index) in 2\" :key=\"o\" :offset=\"index > 0 ? 2 : 0\">\n" +
                    "    <el-card :body-style=\"{ padding: '0px' }\">\n" +
                    "      <img src=\"http://img06.tooopen.com/images/20160921/tooopen_sy_179583447187.jpg\" class=\"image\">\n" +
                    "      <div style=\"padding: 14px;\">\n" +
                    "        <span>好吃的汉堡</span>\n" +
                    "        <div class=\"bottom clearfix\">\n" +
                    "          <time class=\"time\">"+this.currentDate+"</time>\n" +
                    "        </div>\n" +
                    "      </div>\n" +
                    "    </el-card>\n" +
                    "  </el-col>\n" +
                    "</el-row>\n";
                console.log('返回数据结果：', result)
        });
        }
		}
</script>