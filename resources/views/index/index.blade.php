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
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

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
		</el-main>
		<img class="hidden-xs-only" id="backToTop" src="/img/kotori.png" onclick="backToTop()"/>

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
//	var isCollapse = false;
//	var ShowTitle = false;
	//	console.log(document.body.clientWidth)
	ScreenWidth = document.body.clientWidth;
	if(ScreenWidth <= 764){
//		isCollapse = true;
//		document.getElementById('backToTop').style.display = "none";
//		ShowTitle = true;
	}
//	console.log(document.documentElement.clientHeight)
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
//		console.log("滚动距离" + scrollTop);
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
<script type="text/javascript">
	/*天真网（tzw520.cn） 鼠标特效 */
	var a_idx = 0;
	jQuery(document).ready(function($) {
		//		鼠标点击特效----start
		$("body").click(function(e) {
			var a = new Array("天真","富强", "民主", "文明", "和谐", "自由", "平等", "公正" ,"法治", "爱国", "敬业", "诚信", "友善");
			var $i = $("<span/>").text(a[a_idx]);
			a_idx = (a_idx + 1) % a.length;
			var x = e.pageX,
					y = e.pageY;
			$i.css({
				"z-index": 999999999999999999999999999999999999999999999999999999999999999999999,
				"top": y - 20,
				"left": x,
				"position": "absolute",
				"font-weight": "bold",
				"color": "#ff6651"
			});
			$("body").append($i);
			$i.animate({
						"top": y - 180,
						"opacity": 0
					},
					1500,
					function() {
						$i.remove();
					});
		});
		//		鼠标点击特效----end
		//		时钟----start
		var d = new Date();

		window.timeObj = {
			year: d.getFullYear() ,
			month: (d.getMonth()+1) ,
			day: d.getDate() ,
			hour: d.getHours(),
			minute: d.getMinutes(),
			second: d.getSeconds(),
		};

		initTime(12, 10, 7, 10, 3);

		//		字间距，汉字大小，数字宽，数字高，线条粗细
		function initTime(textWid, fontSize, numWidth, numHeight, lineWidth) {
			var time = document.getElementById('time');
			var front = document.createElement('canvas');
			var frontCtx = front.getContext('2d');
			var back = document.createElement('canvas');
			var backCtx = back.getContext('2d');
			var ratio = window.devicePixelRatio || 1;
			var color = '#535c63';
			time.appendChild(back);
			time.appendChild(front);
			front.width = back.width = time.offsetWidth * ratio;
			front.height = back.height = time.offsetHeight * ratio;
			frontCtx.strokeStyle = color;
			frontCtx.lineCap = 'round';
			frontCtx.lineJoin = 'round';

			textWid *= ratio;
			fontSize *= ratio;
			console.log('ziti:'+fontSize);
			numWidth *= ratio;
			numHeight *= ratio;
			lineWidth *= ratio;
			var halfTextWid = textWid / 2;
			var halfFontSize = fontSize / 2;
			var halfNumWidth = numWidth / 2;
			var halfNumHeight = numHeight / 2;
			var y = back.height / 2;
			backCtx.textAlign = 'center';
			backCtx.textBaseline = 'middle';
			backCtx.font = fontSize + 'px sans-serif, "黑体"';

			var ready = false;
			var cache = {};

			var ch = ['年', '月', '日', '时', '分', '秒'];
			var keys = Object.keys(window.timeObj);
			var timeMap = {
				0: '1110111', // |-|_ |_|
				1: '0010001',
				2: '0111110',
				3: '0111011',
				4: '1011001',
				5: '1101011',
				6: '1101111',
				7: '0110001',
				8: '1111111',
				9: '1111011',
			};

			function formatTime(n) {
				n = String(n);
				return n.length === 1 ? '0' + n : n;
			}

			// auto increment time
			function updateTime() {
				var date = new Date();
				var latestDay = new Date(
						date.getFullYear(),
						date.getMonth() + 1,
						0
				).getDate();

				// calculate time
				var up = [0, 12, latestDay, 24, 60, 60];
				while (up.length) {
					var index = up.length - 1;
					var upper = up.pop();
					var key = keys[index];
					if (++window.timeObj[key] >= upper && upper) {
						window.timeObj[key] = index >= 3 ? 0 : 1;
					} else {
						break;
					}
				}

				drawText(window.timeObj);
			}

			function Line(pos1, pos2, frontLine) {
				this.pos1 = pos1;
				this.pos2 = pos2;
				this.value = '0';
				this.moving = false;
				this.shouldMove = false;
				this.frontLine = frontLine;

				this.start = pos1;
				this.end = pos1;
				this.direction = false;

				this.movingPos = null;
				this.goalPos = null;
				this.addPos = null;
			}

			var lp = Line.prototype;
			lp.frontIsStatic = function() {
				return !this.frontLine || (this.frontLine && this.frontLine.isStatic());
			};

			lp.isStatic = function() {
				return !this.moving && this.frontIsStatic();
			};

			lp.update = function() {
				if (this.frontIsStatic()) {
					this.moving = this.shouldMove;
				}

				if (this.moving) {
					this.updateToGoal();

					if (this.equal(this.movingPos, this.goalPos)) {
						this.shouldMove = this.moving = false;
					}
				}

				if (!this.equal(this.start, this.end) || this.moving) {
					frontCtx.moveTo(this.start.x, this.start.y);
					frontCtx.lineTo(this.end.x, this.end.y);
				}
			};

			lp.updateToGoal = function() {
				if (this.movingPos.x !== this.goalPos.x) {
					this.movingPos.x += this.addPos.x;
					if (Math.abs(this.movingPos.x - this.goalPos.x) <= 0.1) {
						this.movingPos.x = this.goalPos.x;
					}
				}

				if (this.movingPos.y !== this.goalPos.y) {
					this.movingPos.y += this.addPos.y;
					if (Math.abs(this.movingPos.y - this.goalPos.y) <= 0.1) {
						this.movingPos.y = this.goalPos.y;
					}
				}
			};

			lp.equal = function(pos1, pos2) {
				return pos1.x === pos2.x && pos1.y === pos2.y;
			};

			lp.move = function(type) {
				this.shouldMove = true;
				var newPos1 = { x: this.pos1.x, y: this.pos1.y };
				var newPos2 = { x: this.pos2.x, y: this.pos2.y };
				if (type === 1) {
					this.start = this.pos1;
					this.movingPos = this.end = newPos1;
					this.goalPos = newPos2;
				} else if (type === 2) {
					this.start = this.pos1;
					this.movingPos = this.end = newPos2;
					this.goalPos = newPos1;
				} else if (type === 3) {
					this.end = this.pos2;
					this.movingPos = this.start = newPos2;
					this.goalPos = newPos1;
				} else {
					this.end = this.pos2;
					this.movingPos = this.start = newPos1;
					this.goalPos = newPos2;
				}

				this.addPos = {
					x: (this.goalPos.x - this.movingPos.x) / 7,
					y: (this.goalPos.y - this.movingPos.y) / 7,
				};
			};

			function readyForDraw(timeObj, startIndex) {
				backCtx.clearRect(0, 0, back.width, back.height);
				backCtx.lineWidth = frontCtx.lineWidth = lineWidth;
				backCtx.fillStyle = color;

				var startX = 0;
				var a = halfTextWid - halfNumWidth;
				var b = halfTextWid + halfNumWidth;
				var c = y - halfNumHeight;
				var d = y + halfNumHeight;

				ch.forEach(function(text, index) {
					if (index < startIndex) {
						return;
					}

					var num = timeObj[keys[index]];
					var numStr = formatTime(num);
					for (var j = 0; j < numStr.length; j++) {
						var val = numStr[j];
						var map = timeMap[+val];
						var e = startX + a;
						var f = startX + b;
						var coors = [
							{ x: e, y: y }, // left-mid
							{ x: e, y: c }, // left-top
							{ x: f, y: c }, // right-top
							{ x: f, y: y }, // right-mid
							{ x: e, y: y }, // left-mid
							{ x: e, y: d }, // left-bottom
							{ x: f, y: d }, // right-bottom
							{ x: f, y: y }, // right-mid
						];

						var cc = (cache[text + '_' + j] = []);
						backCtx.beginPath();
						backCtx.moveTo(coors[0].x, coors[0].y);

						for (var k = 1; k < coors.length; k++) {
							backCtx.lineTo(coors[k].x, coors[k].y);
							cc.push(new Line(coors[k - 1], coors[k], cc[cc.length - 1]));
						}

						backCtx.strokeStyle = '#eee';
						backCtx.stroke();
						startX += textWid;
					}

					backCtx.fillText(text, startX + halfTextWid, y);
					startX += textWid;
				});
			}

			var latestIndex = 0;
			var startIndex = 0;
			function drawText(timeObj) {
				for (var i = 0; i < keys.length; i++) {
					if (timeObj[keys[i]]) {
						startIndex = i;
						break;
					}
				}

				if (!ready || startIndex !== latestIndex) {
					readyForDraw(timeObj, startIndex);
					ready = true;
				}

				var waiter;
				latestIndex = startIndex;
				ch.forEach(function(text, index) {
					var num = timeObj[keys[index]];
					var numStr = formatTime(num);

					for (var j = 0; j < numStr.length; j++) {
						var cc = cache[text + '_' + j];
						if (!cc) {
							continue;
						}

						var val = numStr[j];
						var map = timeMap[+val];
						for (var k = 0; k < map.length; k++) {
							var val = map[k];
							var line = cc[k];
							if (line.value === val) {
								continue;
							}

							line.value = val;
							if (val === '1') {
								if (cc[k + 1] && cc[k + 1].value === '1') {
									// 1 -> 2
									line.move(3);
								} else {
									// 1 <- 2
									line.move(1);
								}
							} else {
								if (cc[k - 1] && cc[k - 1].value === '1') {
									// 1 -> 2
									line.move(2);
								} else {
									// 1 <- 2
									line.move(4);
								}
							}
						}
					}
				});
			}

			var time = 0;
			function animate() {
				frontCtx.clearRect(0, 0, front.width, front.height);

				frontCtx.beginPath();
				Object.keys(cache).forEach(function(key) {
					cache[key].forEach(function(line) {
						line.update();
					});
				});
				frontCtx.stroke();

				var newTime = Date.now();
				if (newTime - time >= 1000) {
					updateTime();
					time = newTime;
				}

				RAF(animate);
			}

			window.RAF = (function() {
				return (
						window.requestAnimationFrame ||
						window.webkitRequestAnimationFrame ||
						window.mozRequestAnimationFrame ||
						window.oRequestAnimationFrame ||
						window.msRequestAnimationFrame ||
						function(callback) {
							window.setTimeout(callback, 1000 / 60);
						}
				);
			})();

			// start animate
			animate();
		}
		//      时钟----end
	});
</script>
<div style="display: none">
	<script src="https://s13.cnzz.com/z_stat.php?id=1273865734&web_id=1273865734" language="JavaScript"></script>
</div>

</body>
</html>