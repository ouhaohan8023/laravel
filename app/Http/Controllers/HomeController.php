<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }
    //写一篇博客
    public function writeNovel()
    {
        return view('home/writeNovel');
    }
    //文章列表
    public function listNovel()
    {
        $user = Auth::id();
        $list = DB::table('la_novels')->where(['n_uid'=>$user])->get();
        return view('home/listNovel',['list'=>$list]);
    }
    //MarkDown
    public function markDown()
    {
        return view('home/markDown');
    }

    /**
     * @todo html和md格式文本上传以后分别保存，并生成文章
     */

}
