<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <!-- 全ての投稿リスト -->
    <!--↓↓ 検索フォーム ↓↓-->
<div class="search">
    <!--↓↓ 検索フォーム ↓↓-->
         <form id="form5" class="form-inline my-2 my-lg-0 ml-2">
              <input id="sbox5" type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="壁打ちしたいテーマ等入力ください" aria-label="検索..."> 
              <input id="sbtn5" type="submit" value="検索" class="btn btn-info">
        </form>
</div>
    <!--↑↑ 検索フォーム ↑↑-->
    
    @if (count($users_male)>0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>あなたにおすすめの壁打ち相手ー一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($users_male as $user_male)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $user_male->name }}</div>
                                </td>
				                <td class="table-text">
				                @if($user_male->img_url)
				                <img src="/uploads/{{ $user_male->img_url }}">
				                @endif
				                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $user_male->tag }}</div>
                                </td>
                                
                                 <!-- 興味ありボタンの表示 -->
                                <td>
                                    <form action="{{ url('follow/'.$user_male->id) }}" method="POST"> <!-- ターゲットユーザーのID情報がルーティング（follow/というURL）に送信される-->
                                    	{{ csrf_field() }}
                                    	<button type="submit" class="btn btn-danger">
                                    	興味あり
                                    	</button>
                                    </form>
                                </td>
				                
				                @if( Auth::check() )
                                <!-- chatボタンの表示 -->
                                <td>
                                    <form action="{{ url('chats/'.$user_male->id) }}" method="GET"> 
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">話を聞きたい！</button>
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