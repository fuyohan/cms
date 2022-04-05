<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <!-- 全ての投稿リスト -->
    <!--↓↓ 検索フォーム ↓↓-->
       <form class="form-inline my-2 my-lg-0 ml-2">
          <div class="form-group">
          <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
          </div>
          <input type="submit" value="検索" class="btn btn-info">
       </form>
    <!--↑↑ 検索フォーム ↑↑-->
    
    @if (count($posts) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>投稿一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $post->post_title }}</div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $post->post_desc }}</div>
                                </td>
				                <!-- 投稿者名の表示 -->
                                <td class="table-text">
                                    <div>{{ $post->user->name }}</div>
                                </td>
                                
                                <!-- 更新ボタンの表示 -->
                                <td>
                                    <form action="{{ url('postsedit/'.$post->id) }}" method="GET"> 
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">更新 </button>
	                                </form>
	                           </td>
 				                <!-- お気に入りボタン -->
                                <td class="table-text">
                                    <form action="{{ url('post/'.$post->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">いいね</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif
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