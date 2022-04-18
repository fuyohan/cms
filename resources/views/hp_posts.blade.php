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

    
<div class="search">
    <!--↓↓ 検索フォーム ↓↓-->
         <form id="form5" class="form-inline my-2 my-lg-0 ml-2">
              <input id="sbox5" type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索..."> 
              <input id="sbtn5" type="submit" value="検索" class="btn btn-info">
        </form>
</div>

<div class=fullscreen>
    
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