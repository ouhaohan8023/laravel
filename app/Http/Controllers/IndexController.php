<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        左菜单
        $data['menu1'] = DB::table('la_classify')->where('c_pid','=',1)->get();
        $data['menu2'] = DB::table('la_classify')->where('c_pid','=',2)->get();
//        右推荐
        $data['recommend'] = DB::table('la_novels')->orderBy('n_read','DESC')->limit(5)->get();
        return view('index/index',['menu'=>$data]);
    }

    public function test()
    {
        $data = DB::table('la_menu')->get();
        $id = 'm_id';
        $pid = 'm_pid';
        $tree = getTree($data, 0,$id,$pid);
        return $tree;
        return view('home',['menu',$tree]);
    }
}
