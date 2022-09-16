<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <title>ハツラツ</title>
</head>

  <!--Headerエリア--->
  
<!--↓↓ 検索フォーム ↓↓-->
<div class="search">
         <form id="form5" class="form-inline my-2 my-lg-0 ml-2">
              <input id="sbox5" type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="仲間の健康宣言を探して見ましょう" aria-label="検索..."> 
              <input id="sbtn5" type="submit" value="検索" class="btn btn-info">
              
                <!--<label>
                    <input type="radio" name="category" value="0" @if(!request('category')) checked @endif> 全て
                </label>
              
                @foreach($categories as $category)
                <label>
                    <input type="radio" name="category" value="{{$category->id}}" @if($category->id==request('category')) checked @endif> {{$category->name }}
                </label>
                @endforeach-->
        </form>
</div>

<div class=fullscreen>
    <!--↑↑ 検索フォーム ↑↑-->
    <div class="post_top">★ 仲間の健康宣言一覧 ★ </div>
    
    @if (count($posts) > 0)
                    <!-- 記事全体 -->
                    <div class="post_all">
                        @foreach ($posts as $post)

                            <div class="post_block">
                         
				                <!-- 投稿写真 -->
				                <div class="post_img">
				                <!--@if($post->img_url)
				                <img src="/uploads/{{ $post->img_url }}" style="max-width:100%; max-height:200px;">
				                @endif-->
				                     <img src="/uploads/{{$post->user->img_url}}">
				                </div>
				                
				                <div Class="post_under">
    				                <!-- 投稿タイトル -->
                                    <div class="post_title">
                                        <div>{{ $post->post_title }}</div>
                                    </div>
    				                
    				                <!-- 投稿者名の表示 -->
                                    <div class="table-text">
                                        <div>{{ $post->user->name }} さん</div>
                                    </div>
                                    
                                    <div class="post_button">
        	                           <!-- 詳細ボタンの表示 -->
                                        <div class="post_detail">
                                            <form action="{{ url('postsdetail/'.$post->id) }}" method="GET"> 
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">宣言詳細</button>
        	                                </form>
        	                            </div>
        	                            
         				                <!-- お気に入りボタン -->
                                        <div class="post_like">
                                            <form action="{{ url('post/'.$post->id) }}" method="POST"> <!--post/というURL（ルーティング）にリクエストを送信している-->
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">頑張れー👍</button>
                                            </form>
                                            {{$post->favo_user_count}}
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
    @endif
</div>

<!--</div>
    @if( Auth::check())
    @if (count($favo_posts) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                   
                    <thead>
                        <th>お気に入り一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    
                    <tbody>
                        @foreach ($favo_posts as $favo_post)
                            <tr>
                                
                                <td class="table-text">
                                    <div>{{ $favo_post->post_title }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $favo_post->post_desc }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $favo_post->user->name }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif
    @endif-->
@endsection