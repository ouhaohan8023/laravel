<!--标签-->
<template>
	<div id="tag">
		<el-tag v-for="item in tagsList" :key="item.id" type="success">{{item.t_name}}</el-tag>
		<!--<el-tag type="info">标签三</el-tag>-->
		<!--<el-tag type="warning">标签四</el-tag>-->
		<!--<el-tag type="danger">标签五</el-tag>-->
	</div>
</template>

<style>
	.el-tag{
		margin-right: 4px;
	}

</style>
<script>

	export default {
		props: ['tagsList']
	}
</script>