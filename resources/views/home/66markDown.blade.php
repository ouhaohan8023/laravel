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
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

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
                            <sideadmin></sideadmin>
                        </el-aside>
                    </el-col>
                    <el-col :span="20">
                        <el-main>
                            <mavon-editor v-model="message"/>
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
    var Logo = "{{ config('app.name', 'Laravel') }}";
    var isLogin = true;
            @guest
    var userName = "游客";
    @else
            isLogin = false;
    userName = "{{ Auth::user()->name }}";
            {{--userId = "{{ Auth::user()->id }}";--}}
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