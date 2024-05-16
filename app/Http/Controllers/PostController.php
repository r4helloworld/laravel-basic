<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use resources\views\posts;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;
use Symfony\Contracts\Service\Attribute\Required;

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
    
    public function store(Request $request){
        //バリデーションを設定する
        $validated = $request->validate([
            "title" => "required|max:20",
            "content" => "required|max:200",
        ]);
        //postテーブルにデータ追加
        $post = new Posts();
        $post ->title =$validated["title"];
        $post ->content = $validated["content"];
        $post ->save();

        return redirect('/posts')->with('status', 'Post created successfully!');
    }
}
