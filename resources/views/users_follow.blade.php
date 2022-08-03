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
    
    @if (count($users) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>あなたにおすすめの壁打ち相手一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($users as $user)
                            
                            @if($user->follow_done==1 && $user->followed_done==1) <!--相互フォローしているかどうか、andifを書きたい場合は&&を使う-->
                            <tr>
                                <!-- User名前 -->
                                <td class="table-text">
                                    <div>{{ $user->name }}</div>
                                </td>
                                
                                <td class="table-text">
				                @if($user->img_url)
				                <img src="/uploads/{{ $user->img_url }}">
				                @endif
				                </td>
                                
                                <!-- Userタグ -->
                                <td class="table-text">
                                    <div>{{ $user->tag }}</div>
                                </td>
                                

				                @if( Auth::check() )
                                <!-- chatボタンの表示 -->
                                <td>
                                    <form action="{{ url('chats/'.$user->id) }}" method="GET"> 
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">壁打ちを要請</button>
	                                </form>
	                           </td>
                                @endif
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif
    
@endsection