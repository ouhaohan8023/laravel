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

	//Route::get('/', function () {
	//    return view('welcome');
	//});


	Route::get ('/vue' , function () {
		return view ('vue');
	});

	Route::get ('/' , 'IndexController@index');

  Route::get ('/list' , function () {
      return view ('index/list');
  });

	Route::get ('/novel_list' , 'NovelController@index');
	Route::get ('/novel_list2' , 'NovelController@indexList');
	//个人中心
	Route::get ('/novel_list_own' , 'NovelController@index_own');

	Route::get ('/novel_detail' , 'NovelController@detail');

	Route::get ('/novel_add_love' , 'NovelController@addLove');

	Auth::routes ();

	Route::get ('/home' , 'HomeController@index')->name ('home');
	Route::get ('/admin' , 'HomeController@admin');

	Route::get ('/writeNovel' , 'HomeController@writeNovel');
	Route::get ('/listNovel' , 'HomeController@listNovel');
	//markDown
	Route::get ('/markDown' , 'HomeController@markDown');
	Route::post ('/saveNovel' , 'HomeController@markDownSave');
	Route::get ('/markDownEdit' , 'HomeController@markDownEdit');

	Route::get ('/getLabel' , 'HomeController@getLabel');

	Route::get ('/sysIndex' , 'SysController@index');


