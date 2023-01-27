<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use App\Models\Comment;//この行を上に追加
use App\Models\Category;//この行を上に追加
use App\Models\Product; //この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostComplete;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function top_new_kenko()
    {
        $products = Product::get();
        return view('top_new_kenko',[
           'products'=> $products,
        ]);
    }
    
    
public function top_female()
    {
        return view('top_female');
    }

public function index()
    {
        
        $query = Post::orderBy('created_at', 'desc');
        
        // 検索機能
        if ($search = request('search')) {
            $query = $query->where(function (Builder $sub_query) use($search) {
                $sub_query->where('post_title', 'LIKE', "%{$search}%")->orWhere('post_desc','LIKE',"%{$search}%");
            });
        }
        
        if ($category = request('category')) { //このcategoryはBladeでのnameがcategoryとなっているradioで選択されたタブのvalueをrequest関数が返す。→それを$categoryに代入。
            $query = $query->whereHas('categories', function (Builder  $sub_query) use($category)  { //Categoriesがぶら下がっているかどうかの判定(ここでリレーションの判定)    。
                $sub_query->where('id', $category); //完全一致検索だから%は要らない。文字列
            });
        }
        
        $posts = $query->withCount("favo_user")->get(); //この記事に対してお気に入りしているユーザーの数をカウントする。get メソッドの前にwithcountを挟む。

        $users = User::orderby('created_at', 'asc')->get();
        $categories = Category::get();

        
        if (Auth::check()) {
             //ログインユーザーのお気に入りを取得
             $favo_posts = Auth::user()->favo_posts()->get();
             return view('posts',[
             'posts'=> $posts,
             'favo_posts'=>$favo_posts,
             'users'=> $users,
             'categories'=>$categories
             ]);
             
        }else{
            
            return view('posts',[
            'posts'=> $posts,
            'users'=> $users,
            'categories'=>$categories
            ]);
            
        }
       
    }
    
    public function hpindex()
    {
        
        $posts = Post::where("hpmenu", "1")->orderBy('created_at', 'asc')->where(function ($query) {
            
            // 検索機能
            if ($search = request('search')) {
                $query->where('post_title', 'LIKE', "%{$search}%")->orWhere('post_desc','LIKE',"%{$search}%");
            }
            
        })->withCount("favo_user")->get();
        
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
        $categories = Category::get();
        return view('input',[
            'categories'=>$categories
            ]);
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
            
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //以下に登録処理を記述（Eloquentモデル）
        $post = new Post;
        
        // 画像ファイル取得
        $file = $request->img; //$requestは引数。コントローラの関数の引数。
    
        if ( !empty($file) ) {
    
            // ファイルの拡張子取得
            $ext = $file->guessExtension();
    
            //ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;
    
            // 画像のファイル名を任意のDBに保存
            $post->img_url = $fileName;
    
            //public/uploadフォルダを作成
            $target_path = public_path('/uploads/');
    
            //ファイルをpublic/uploadフォルダに移動
            $file->move($target_path,$fileName);
        }
        
        $post->post_title = $request->post_title; 
        $post->post_desc_title = $request->post_desc_title;
        $post->post_desc = $request->post_desc;
        $post->post_fre_what = $request->post_fre_what;
        $post->post_time_what = $request-> post_time_what;
        $post->video_url = $request-> video_url;
        $post->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $post->save();
        $post->categories()->sync($request->categories); //saveの後にかく（sync = 同期をかける、カテゴリーとポストの接続テーブルに関するsaveも兼ねている。何も選ばなければ接続をきる処理になる）
        
        $users = User::all();
        foreach ($users as $recipient) {
           Mail::to($recipient)->send(new PostComplete($post));
        }
        
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
            'post'=>$post //bladeに対してpostテーブル（レコード1本だけ）のデータを渡す
        ]);
    }
    
    public function detail(Post $post) //にだんがまえ前の仕様
    {
        $comments = Comment::orderBy('created_at', 'desc')->where("post_id",$post->id)->get();
        
        $post->loadCount("favo_user");
    
        return view('postsdetail',[
            'post'=>$post, //bladeに対してpostテーブル（レコード1本だけ）のデータを渡す
            'comments'=> $comments, //bladeに対してcommentテーブル（レコード1本だけ）のデータを渡す
        ]);
        
    }
    
    public function comment(Post $post) 
    {
        return view('postscomment',[
            'post'=>$post //bladeに対してpostテーブル（レコード1本だけ）のデータを渡す
        ]);
    }
    
    public function docomment(Request $request)
    {
        //以下に登録処理を記述（Eloquentモデル）
        $comment = new Comment;
        // Eloquent モデル
        $comment->comment_desc = $request->comment_desc; 
        $comment->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $comment->post_id = $request->id;
        $comment->save(); 
        return redirect('/postsdetail/'.$request->id);
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
        
        //お気に入りする記事(blade fileでの操作でidが渡されている ⇒ find：pそのidでoposttableからデータを取ってくる)
        $post = Post::find($post_id);
        
        //リレーションの登録(この記事に対するfavo_userとして、ログインユーザーを登録する)
        $post->favo_user()->attach($user);
        
        return redirect('/posts');
        
    }
    
     public function favodelete($post_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $post = Post::find($post_id);
        
        //リレーションの登録(この記事のfavo_userとして登録されているログインユーザーを外す)
        $post->favo_user()->dettach($user);
        
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
