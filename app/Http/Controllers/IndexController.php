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
        return view('index/index');
    }

    public function getSideMenu()
    {
        $data['menu1'] = DB::table('la_classify')->where('c_pid','=',1)->get();
        $data['menu2'] = DB::table('la_classify')->where('c_pid','=',2)->get();
        return $data;
    }

    public function test()
    {
        $addr = getCity('101.78.3.131');
        var_dump($addr);
        die;
    }
}
