<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SysController extends Controller
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
        return view('sys/index');
    }

    /**
     * 标签展示
     */
    public function tagsController()
    {
        $user = Auth::id();
        $list = DB::table('la_tags')->where(['t_u_id'=>$user])->OrderBy('t_id', 'ASC')->get();
        $data = ['list' => $list,'uid' => $user];
        return $data;
    }

    /**
     * 新增标签
     */
    public function tagsControllerAdd()
    {
        $user = Auth::id();
//        $data['t_name'] =
        return Input::get('t_name');
    }


}
