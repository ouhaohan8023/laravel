<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
	<style>
		.el-aside{
			margin-top: 20px;
		}
		/*.component-fade-enter-active, .component-fade-leave-active {*/
			/*transition: opacity .3s ease;*/
		/*}*/
		/*.component-fade-enter, .component-fade-leave-to*/
			/*!* .component-fade-leave-active for below version 2.1.8 *! {*/
			/*transform: translateX(10px);*/
			/*opacity: 0;*/
		/*}*/
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
	</style>
</head>
<body>
<div id="app">

	<main class="py-4">
		<el-container>
			<el-header>
				<headbar></headbar>
			</el-header>
			<el-container>
				<el-aside width="200px">
					<side></side>
				</el-aside>
				<el-main>
					{{--<breadcrumb></breadcrumb>--}}
					{{--<novel></novel>--}}
					<transition name="component-fade" mode="out-in">
					<router-view></router-view>
					</transition>
				</el-main>
			</el-container>
		</el-container>
	</main>
</div>
</body>
</html>
