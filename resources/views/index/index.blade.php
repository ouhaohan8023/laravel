<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
	<!--默认使用极速内核：针对国内浏览器产商-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="description"  content="Ohh的博客,一个叙述生活的地方" />
	<meta name="keywords"  content="Ohh,Ohh的博客,Ohh Blog,科学上网,ShadowsocksR,PHP,Laravel,VueJs" />
	<meta name="robots" content="index,follow" />
	<meta name="google" content="index,follow" />
	<meta name="googlebot" content="index,follow" />
	<meta name="verify" content="index,follow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/extra/smoothscroll.js') }}"></script>
	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="{{asset('css/google.family.css')}}" rel="stylesheet" type="text/css">

	{{--ico--}}
	<link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
	<link rel="manifest" href="/ico/site.webmanifest">

	{{--md样式--}}
	<link rel="stylesheet" href="/css/markdown.css?v=1.1">

	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<!-- Styles -->
	{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
	<style>
		.el-aside{
			margin-top: 20px;
		}
		.component-fade-enter-active {
			transition: all .3s ease;
		}
		.component-fade-leave-active {
			transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
		}
		.component-fade-enter, .slide-fade-leave-to
			/* .slide-fade-leave-active for below version 2.1.8 */ {
			transform: translateX(10px);
			opacity: 0;
		}
		html{
			min-height: 100%;
		}
		body{
			height: 100%;
			min-height: 1000px;
			background-color: #efeeea;
			margin-top:0;
			font-family:Arial,'Times New Roman','Microsoft YaHei',SimHei;
		}
		.el-header{
			position: fixed;
			width: 100%;
			z-index: 100;
		}
		.contents{
			margin-top: 50px;
		}
		.el-row{
			width: 100%;
		}
		.el-footer {
			background-color: rgb(83, 92, 99);
			color: #efeeea;
			font-size: 13px;
		}
		footer{
			height:60px;
			position:fixed;
			bottom:0;
			left:0px;
			width: 100%
		}
		main{
			margin-bottom: 30px;
		}
		#loading{
			width: 100%;
			height: 100%;
			position: fixed;
			background-color: #f54;
			z-index: 200;
			text-align: center;

		}
		#loading h1{
			font-size: 4rem;
			line-height: 5rem;
			color: #fff;
			font-family: 'Helvetica Neue', Helvetica, sans-serif;
			margin-bottom: 0;
		}
		#loading p{
			font-size: 1rem;

		}
		.tableohh {
			display: table;
			width: 100%;
		}
		#loading .table-cell {
			display: table-cell;
			vertical-align: middle;
		}
		#loading .small {
			font-size: 1rem;
			line-height: 1.5rem;

			font-family: Arial,'Times New Roman','Microsoft YaHei',SimHei;
			color: #fff;
		}
		#backToTop{
			position: fixed;
			bottom: -150px;
			left: -150px;
			width: 150px;
			z-index: 10000;
			transition: all 0.3s;
		}
		#app #backToTop:hover{
			left: 0 !important;
			bottom: 0 !important;
		}
		.right{
			margin-top: 20px
		}
		.contents .contents_row {
			/*width: 1100px;*/
			margin: 0 auto;
			max-width: 1226px;
		}
		#time {
			position: relative;
			/*margin: 0 80px;*/
			height: 30px;
		}
		#time canvas {
			position: absolute;
			/*width: 100%;*/
			height: 100%;
			font-size: 7px;
		}
	</style>
</head>
<body>
<div id="loading" class="tableohh">
	<div class="table-cell">
		<img src="/img/loading-bubbles.svg" width="64" height="64" />
		<h1 class="h1 mt2 mb0">Loading...</h1>
		<p class="small mb2">Crossing The Great Firewall of China</p>
	</div>
</div>
<div id="app">
	<el-container>
		<el-header onclick="backToTop()">
			<headbar></headbar>
		</el-header>
		<el-main class="contents">
			<el-row class="contents_row">
				<el-col :xs="24" :sm="4" :md="4" :lg="4" :xl="3" class="hidden-xs-only">
					<el-aside width="">
						{{--{{$menu->menu1}}--}}
						<side v-bind:menu1="{{$menu['menu1']}}" v-bind:menu2="{{$menu['menu2']}}" defaultactive='1-4' ></side>
					</el-aside>
				</el-col>
				<el-col :xs="24" :sm="4" :md="4" :lg="4" :xl="3" class="hidden-sm-and-up">
					<el-aside width="">
						{{--{{$menu->menu1}}--}}
						<side v-bind:menu1="{{$menu['menu1']}}" v-bind:menu2="{{$menu['menu2']}}" defaultactive='1' ></side>
					</el-aside>
				</el-col>
				<el-col :xs="24" :sm="20" :md="15" :lg="15" :xl="15">
					<el-main>
						<transition name="component-fade" mode="out-in">
							<router-view></router-view>
						</transition>
					</el-main>
				</el-col>
				<el-col :xs="24" :sm="24" :md="5" :lg="5" :xl="5" class="hidden-sm-and-down">
					<el-row class="right">
						<div id="time"></div>
						<advertise v-bind:recommend="{{$menu['recommend']}}"></advertise>
					</el-row>
				</el-col>
			</el-row>
			<img class="hidden-xs-only" id="backToTop" src="/img/kotori.png" onclick="backToTop()"/>
		</el-main>

		<el-footer>
			<footers></footers>
		</el-footer>
	</el-container>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
</div>
<script>
	var User = "{{ Auth::user() }}";
	var Logo = "{{ config('app.logo') }}";
	var isLogin = true;
			@guest
	var userName = "游客";
	@else
			isLogin = false;
	userName = "{{ Auth::user()->name }}";
			@endguest
	var logOutUrl = '{{ route('logout') }}'
	var RegisterUrl = '{{ route('register') }}'
	var LoginUrl = '{{ route('login') }}'
	var novel_list_id = 1;
	//	console.log(document.body.clientWidth)
	ScreenWidth = document.body.clientWidth;
	if(ScreenWidth <= 764){
//		isCollapse = true;
//		document.getElementById('backToTop').style.display = "none";
//		ShowTitle = true;
	}
	console.log(document.documentElement.clientHeight)
</script>
<script>
	{{--关闭加载动画--}}
	document.addEventListener('DOMContentLoaded', function() {
		var id = document.getElementById("loading");
		id.style.display = "none";
	});
	var show = 0;

	window.onscroll = function() {
		//为了保证兼容性，这里取两个值，哪个有值取哪一个
		//scrollTop就是触发滚轮事件时滚轮的高度
		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		console.log("滚动距离" + scrollTop);
//		var total_area = document.getElementById('app').clientHeight;
//		var able_area = document.documentElement.clientHeight
//		console.log('fff:'+total_area)
		if(scrollTop>200 && show == 0){
			show = 1;
//			console.log('是时候了！')
			document.getElementById('backToTop').style.left="-30px"
			document.getElementById('backToTop').style.bottom="-30px"
		}else if(scrollTop < 200 && show == 1){
			show = 0;
			document.getElementById('backToTop').style.left="-150px"
			document.getElementById('backToTop').style.bottom="-150px"
//			console.log('撤')
		}
	}
	function backToTop(){
		window.scroll({ top: 0, left: 0, behavior: 'smooth' });
	}

</script>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/ohh.js')}}"></script>
<div style="display: none">
	<script src="https://s13.cnzz.com/z_stat.php?id=1273865734&web_id=1273865734" language="JavaScript"></script>
</div>

</body>
</html>