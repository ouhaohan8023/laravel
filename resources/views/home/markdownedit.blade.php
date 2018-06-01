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
    <script src="{{ asset('js/admin_editor.js') }}" defer></script>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <style>
        .el-aside {
            margin-top: 20px;
        }

        .component-fade-enter-active {
            transition: all .3s ease;
        }

        .component-fade-leave-active {
            transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
        }

        .component-fade-enter, .slide-fade-leave-to
            /* .slide-fade-leave-active for below version 2.1.8 */
        {
            transform: translateX(10px);
            opacity: 0;
        }

        body {
            background-color: #efeeea;
            margin-top: 0;
        }

        .el-header {
            position: fixed;
            width: 100%;
            z-index: 100;
        }

        .contents {
            margin-top: 50px;
        }

        .el-row {
            width: 100%;
        }
        .footerBtn {
            text-align: right;
            padding-right: 20px;
        }

        .el-select .el-input {
            width: 130px;
        }

        .input-with-select .el-input-group__prepend {
            background-color: #2c2827;
        }

        .el-input-group__prepend div.el-select .el-input__inner {
            color: #999999;
            background-color: #2c2827;
        }

        .input-ohh .el-input__inner {
            color: #999999;
            background-color: #2c2827;
        }

        .el-input-group__prepend div.el-select:hover .el-input__inner {
            color: #999999;
            background-color: #2c2827;
        }

        .el-checkbox__input.is-checked .el-checkbox__inner {
            background-color: #2c2827;
            border-color: #2c2827;
        }

        .novelClassify {
            color: #606266;
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
                <el-row>
                    <el-col :span="4">
                        <el-aside width="">
                            <sideadmin></sideadmin>
                        </el-aside>
                    </el-col>
                    <el-col :span="20">
                        <el-main>
                            {{--<breadcrumb></breadcrumb>--}}
                            {{--<novel></novel>--}}
                            <div class="container">
                                <el-row>
                                    <el-col :span="24">
                                        <div style="text-align: center;margin-bottom: 10px">
                                            <el-input  class="input-with-select input-ohh"
                                                      style="width: 95%">
                                                <el-select v-model="select" slot="prepend" placeholder="请选择">
                                                    <el-option label="原创" value="1"></el-option>
                                                    <el-option label="转载" value="2"></el-option>
                                                    <el-option label="翻译" value="3"></el-option>
                                                </el-select>
                                            </el-input>
                                        </div>
                                    </el-col>
                                </el-row>

                                <el-row>
                                    <el-col :span="24">
                                        <div id="test-editormd">
                                            <textarea id="markdown-textarea" class="editormd-markdown-textarea"
                                                      name="test-editormd-markdown-textarea"
                                                      style="display:none;">
                                                {{$data->n_md}}
                                            </textarea>
                                            <textarea id="html-code" class="editormd-html-textarea" name="test-editormd-html-code"
                                                      style="display:none;"></textarea>
                                        </div>
                                    </el-col>
                                </el-row>
                                <el-row>
                                    <span class="el-checkbox__label novelClassify">文章分类</span>
                                    <el-cascader
                                            :options="options"
                                            v-model="selectedOptions3"
                                    ></el-cascader>
                                </el-row>
                                <el-row style="padding-left: 15px;padding-right: 15px;margin-top: 10px;">
                                    <el-checkbox-group v-model="checkList">
                                        @foreach ($list as $l)
                                            <el-col :span="6">
                                                <el-checkbox :label={{$l->t_id}}> {{ $l->t_name }}</el-checkbox>
                                            </el-col>
                                        @endforeach
                                    </el-checkbox-group>
                                </el-row>
                                <el-row class="footerBtn">
                                    <el-button type="primary" plain v-on:click="getValue">发布</el-button>
                                </el-row>
                            </div>
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
    if (ScreenWidth <= 764) {
        isCollapse = true;
        ShowTitle = true;
    }
    app.input5 = '{{$data->n_mainname}}';
    {{--document.getElementsByClassName('.input-ohh .el-input__inner').value = '{{$data->n_mainname}}';--}}
//    console.log('标题:'+app.input5);

    $(document).ready(function () {
        $('.input-ohh input:eq(1)').val('{{$data->n_mainname}}')
    })
</script>
@include('markdown::encode',['editors'=>['test-editormd']])
</body>
</html>
