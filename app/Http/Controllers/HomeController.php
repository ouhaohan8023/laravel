<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

    //获取标签
    public function getLabel(){
        $uid = Auth::id();
        $list = DB::table('la_tags')->where(['t_u_id'=>$uid])->get();
        return $list;
    }
    /**
     * @todo html和md格式文本上传以后分别保存，并生成文章
     */
    public function markDownSave()
    {
        $data['n_mainname'] = Input::get('title');
        $data['n_overview'] = Input::get('text');
        $data['n_content'] = Input::get('html');
        $data['n_tags'] = Input::get('tags');
        $data['n_md'] = Input::get('md');
        $classify = Input::get('classify');
        $data['n_one'] = $classify[0];
        $data['n_two'] = $classify[1];
        $data['n_uid'] = Auth::id();
        $data['n_type'] = Input::get('type');
        $data['n_buildtime'] = date('Y-m-d H:i:s');
        $data['n_changetime'] = $data['n_buildtime'];
        $add = DB::table('la_novels')->insert($data);
        if($add){
            $ret['code'] = 200;
            $ret['msg'] = 'OK';
        }else{
            $ret['code'] = 400;
        }
        return $ret;
    }

    /**
     * @TODO 修改文章用vuejs加载不出来，暂时用新页面代替，希望有大神改进
     */
    public function markDownEdit()
    {
        $find['n_id'] = 20;
        $find['n_uid'] = Auth::id();
        $list = DB::table('la_tags')->where(['t_u_id'=>$find['n_uid']])->get();
        $data = DB::table('la_novels')->where($find)->first();

//        var_dump($list);die;
        return view('home/markdownedit',['data'=>$data,'list'=>$list]);
    }

}
