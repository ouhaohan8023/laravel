<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

	{{--ico--}}
	<link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
	<link rel="manifest" href="/ico/site.webmanifest">

	{{--md样式--}}
	<link rel="stylesheet" href="/css/editormd.min.css">

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
		body{
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
	</style>

	{{--百度站长--}}
	<script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?c0d98d5457659db7c058b39cdf2d03d7";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
	</script>

	{{--友盟--}}
	{{--<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan style='display:none;' id='cnzz_stat_icon_1273865734'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1273865734' type='text/javascript'%3E%3C/script%3E"));</script>--}}
</head>
<body>
<div id="app">

	<main class="py-4">
		<el-container>
			<el-header>
				<headbar></headbar>
			</el-header>
			<el-container class="contents">
				<el-row >
					<el-col :span="4">
						<el-aside width="">
							<side></side>
						</el-aside>
					</el-col>
					<el-col :span="20">
						<el-main>
							{{--<breadcrumb></breadcrumb>--}}
							{{--<novel></novel>--}}
							<transition name="component-fade" mode="out-in">
								<router-view></router-view>
							</transition>
						</el-main>
					</el-col>
				</el-row>
			</el-container>
		</el-container>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
	</main>
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
	var isCollapse = false;
	var ShowTitle = false;
//	console.log(document.body.clientWidth)
	ScreenWidth = document.body.clientWidth;
	if(ScreenWidth <= 764){
		isCollapse = true;
		ShowTitle = true;
	}


</script>
</body>
</html>
