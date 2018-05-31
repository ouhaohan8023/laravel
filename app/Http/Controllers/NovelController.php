<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class NovelController extends Controller
{
    //列表展示
    public function index(){
//        $find['n_two'] = isset($_GET['id'])?$_GET['id']:null;
        $list = DB::table('la_novels')->leftJoin('la_icon_link','la_novels.n_type','=','la_icon_link.ic_id')->orderByRaw('n_id DESC')->get();
        $data = ['novel' => $list];
        return $data;
    }
    //列表展示,分类
    public function indexList(){
        $find['n_two'] = Input::get('id');
        $list = DB::table('la_novels')->where($find)->leftJoin('la_icon_link','la_novels.n_type','=','la_icon_link.ic_id')->orderByRaw('n_id DESC')->get();
        $data = ['novel' => $list];
        return $data;
    }

    //个人列表展示
    public function index_own(){
        $uid = Auth::id();
        $list = DB::table('la_novels')->where(['n_uid'=>$uid])->leftJoin('la_icon_link','la_novels.n_type','=','la_icon_link.ic_id')->orderByRaw('n_id DESC')->get();
        $data = ['novel' => $list];
        return $data;
    }
    //文章详情
    public function detail(){
        $id = isset($_GET['id'])?$_GET['id']:null;
        if($id==null||empty($id)){
            return 404;
        }else{
            //文章+1
            DB::table('la_novels')->where(['n_id'=>$id])->increment('n_read');
            //  获取文章
            $novel = DB::table('la_novels')->where('n_id', $id)->leftJoin('users', 'la_novels.n_uid', '=', 'users.id')->first();
            //  获取标签
            $tags = rtrim($novel->n_tags,',');
            $tagsLen = strlen($tags);
            if($tagsLen<2){
                //只有一个标签
                $tagsArr = DB::table('la_tags')->where('t_id', $tags)->first();
            }else{
                //两个标签及以上
                $tagsArrExp = explode(',',$tags);
                $tagsArr = DB::table('la_tags')->select('t_name')->whereIn('t_id', $tagsArrExp)->get();
            }
            $data = ['novel' => $novel,'tags' => $tagsArr];
            return $data;
        }
    }

    //点赞
    public function addLove(){
        $id = isset($_GET['id'])?$_GET['id']:null;
        if($id==null||empty($id)){
            return 404;
        }else{
            $love = DB::table('la_novels')->where(['n_id'=>$id])->increment('n_love');

            return $love;
        }
    }
}
