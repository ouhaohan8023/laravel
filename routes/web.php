<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

	Auth::routes ();//认证

	//	后台

	Route::get ('/novel_list_own' , 'NovelController@index_own');//个人博客列表展示
	Route::get ('/admin' , 'HomeController@admin');//后台首页
	//markDown
	Route::post ('/saveNovel' , 'HomeController@markDownSave');//生成文章，将文章存入数据库
	Route::put ('/doMarkDownEdit/{id}' , 'HomeController@doMarkDownEdit');//保存编辑好的文章
	Route::get ('/getLabel' , 'HomeController@getLabel');//获取用户对应标签
	Route::get ('/markDownClassify' , 'HomeController@markDownClassify');//获取分类
	//	系统管理
	Route::get ('/sysIndex' , 'SysController@index');
	Route::get ('/sys/tagsController' , 'SysController@tagsController');//标签管理首页
	Route::post ('/sys/tagsControllerAdd' , 'SysController@tagsControllerAdd');//标签管理----新增标签，删除标签


//	前台
	Route::get ('/' , 'IndexController@index');//首页
	Route::get ('/sidebar' , 'IndexController@sidebar');//左菜单
	Route::get ('/novel_list' , 'NovelController@index');//首页---全部文章列表
	Route::get ('/novel_list2' , 'NovelController@indexList');//首页---部分文章列表
	Route::get ('/novel_detail' , 'NovelController@detail');//文章内容
	Route::get ('/novel_add_love' , 'NovelController@addLove');//文章点赞


	//测试
	Route::get ('/test', 'IndexController@test');//测试