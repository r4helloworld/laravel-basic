<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use resources\views\posts;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class PostController extends Controller
{
    //
    public function index()
    {
        //テーブル、ポストの投稿データを取得
        $posts=DB::table("posts")->get();
        //ビュー、ポストインデックスにデータを渡す
        return view ("posts.index",compact("posts"));
        
    }

    public function show($id){
        $posts = Posts::find($id);
        //変数$postsをposts/show.blade.phpに
        return view ("posts.show",compact("posts"));
    }
    public function create(){
        return view ("posts.create");
    }
}
