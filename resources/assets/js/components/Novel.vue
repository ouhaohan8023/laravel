<template>
	<!--<transition name="bounce" mode="out-in">-->
	<div class="container">
		<section v-loading="loading">
			<h2>主标题</h2>
			<h1>副标题</h1>
			<div class="content">
				<h4>内容</h4>
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
</style>
<script>
    export default {
        data () {
            return {
                loading: true
						}
				},
        mounted(){
            var id= this.$route.query.id
            Vue.resource('/laravel/public/novel_detail?id='+id).get().then((response) => {
                return response.text()
            }).then((result) => {
                this.loading = false;
                console.log('返回数据结果：', result)
        });
        }
		}
</script>