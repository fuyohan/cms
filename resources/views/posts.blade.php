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
  <header>
    <div class="menu">
      <ul class=nav>
        <li class="li"><a href="./input">ハツラツ生活ナレッジ<br>を投稿</a></li>
        <li class="li"><a href="./hp">今月のマイHP</a></li>
      </ul>
    </div>
  </header>

 <div class=fullscreen>
    <!-- Bootstrapの定形コード… -->
    <!-- 全ての投稿リスト -->
    <!--↓↓ 検索フォーム ↓↓-->
    <div class="search">
       <form class="form-inline my-2 my-lg-0 ml-2">
          <div class="search_form">
          <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
          </div>
          <input type="submit" value="検索" class="btn btn-info">
       </form>
    </div>
    <!--↑↑ 検索フォーム ↑↑-->
    @if (count($posts) > 0)
                    <!-- 記事全体 -->
                    <div class="post_all">
                        @foreach ($posts as $post)
                        
                            <div class="post_block">
                         
				                <!-- 投稿写真 -->
				                <div class="post_img">
				                @if($post->img_url)
				                <img src="/uploads/{{ $post->img_url }}" style="max-width:100%; max-height:200px;">
				                @endif
				                </div>
				                
				                <div Class="post_under">
    				                <!-- 投稿タイトル -->
                                    <div class="post_title">
                                        <div>{{ $post->post_title }}</div>
                                    </div>
    				                
    				                <!-- 投稿者名の表示 -->
                                    <!--<div class="table-text">
                                        <div>{{ $post->user->name }}</div>
                                    </div>-->
                                    
                                    <div Class="post_button">
        	                           <!-- 詳細ボタンの表示 -->
                                        <div class="post_detail">
                                            <form action="{{ url('postsdetail/'.$post->id) }}" method="GET"> 
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">詳細 </button>
        	                                </form>
        	                            </div>
         				                <!-- お気に入りボタン -->
                                        <div class="post_like">
                                            <form action="{{ url('post/'.$post->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">継続中👍</button>
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

    @if( Auth::check())
    @if (count($favo_posts) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>お気に入り一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($favo_posts as $favo_post)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $favo_post->post_title }}</div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $favo_post->post_desc }}</div>
                                </td>
                                <!-- 投稿者名の表示 -->
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
    @endif
@endsection