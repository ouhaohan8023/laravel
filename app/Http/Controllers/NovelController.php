<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovelController extends Controller
{
    //
    public function detail(){
        $id = isset($_GET['id'])?$_GET['id']:null;
        if($id==null||empty($id)){
            return 404;
        }else{
            return $id;
        }
    }
}
