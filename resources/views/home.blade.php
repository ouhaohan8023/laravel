@extends('layouts.app')

@section('content')
<style>
    .nav{
        display: block;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked SideNav">
                <li class="nav-item">
                    <a href="#" data="/listNovel" class="nav-link">文章列表</a>
                </li>
                <li class="nav-item">
                    <a href="#" data="/sysIndex" class="nav-link">系统管理</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 mainContent">

        </div>
    </div>

    <script>
//        console.log(222);
        $(document).ready(function(){
            $('.nav li a').click(function(){
                $('.nav li a').removeClass('active');
                $(this).addClass('active');
//                console.log($(this).attr('data'))
                var redirect = $(this).attr('data');
                $('.mainContent').load(redirect)
            })
        })
    </script>
</div>

@endsection
