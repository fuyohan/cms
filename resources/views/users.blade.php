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
    
    @if (count($users) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>ユーザ一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $user->name }}</div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $user->email }}</div>
                                </td>
				                
				                <td class="table-text">
				                @if($user->img_url)
				                <img src="/uploads/{{ $user->img_url }}">
				                @endif
				                </td>
				                
				                @if( Auth::check() )
                                <!-- chatボタンの表示 -->
                                <td>
                                    <form action="{{ url('chats/'.$user->id) }}" method="GET"> 
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">メッセージを送る </button>
	                                </form>
	                           </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif
    
@endsection