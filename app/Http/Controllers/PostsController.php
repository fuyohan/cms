<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function top()
    {
        return view('top');
    }


public function index()
    {
        
        $posts = Post::orderBy('created_at', 'asc')->where(function ($query) {
            
            // 検索機能
            if ($search = request('search')) {
                $query->where('post_title', 'LIKE', "%{$search}%")->orWhere('post_desc','LIKE',"%{$search}%");
            }
            
        })->get();
        
        if (Auth::check()) {
             //ログインユーザーのお気に入りを取得
             $favo_posts = Auth::user()->favo_posts()->get();
             
            return view('posts',[
            'posts'=> $posts,
            'favo_posts'=>$favo_posts
            ]);
            
        }else{
            
            return view('posts',[
            'posts'=> $posts
            ]);
            
        }
       
    }
    
    public function input()
    {
        return view('input');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション 
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:255',
            'post_desc' => 'required|max:255',
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //以下に登録処理を記述（Eloquentモデル）
        $posts = new Post;
        $posts->post_title = $request->post_title;
        $posts->post_desc = $request->post_desc;
        $posts->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $posts->save();
        
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) //にだんがまえ前の仕様
    {
        return view('postsedit',[
            'post'=>$post //bladeに対してpostテーブル（レコード1本だけ）のデータ
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function favo($post_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $post = Post::find($post_id);
        
        //リレーションの登録
        $post->favo_user()->attach($user);
        
        return redirect('/posts');
        
    }
    
    public function update(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            //'post_title' => 'required|max:255',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/posts')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquent モデル
        $posts = Post::find($request->id);
        $posts->post_title = $request->post_title;
        $posts->post_desc = $request->post_desc;
        $posts->save(); 
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
