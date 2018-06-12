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
        $data['menu1'] = DB::table('la_classify')->where('c_pid','=',1)->get();
        $data['menu2'] = DB::table('la_classify')->where('c_pid','=',2)->get();
//        return $data;
//        var_dump($data);die;
        return view('index/index',['menu'=>$data]);
    }

    public function test()
    {
        $data = DB::table('la_classify')->get();
        $id = 'c_id';
        $pid = 'c_pid';
        $tree = getTree($data, 0,$id,$pid);
        return makeJson($tree);
    }
}
