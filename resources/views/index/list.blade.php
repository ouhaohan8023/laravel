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
					{{--<h1>Hello @{{message}} 888</h1>--}}
					{{--<novellist></novellist>--}}
					<router-view></router-view>

				</el-main>
			</el-container>
		</el-container>
	</main>
</div>
<script>

</script>
</body>
</html>
