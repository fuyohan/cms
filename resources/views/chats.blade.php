@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
       <form action="{{ url('dochats') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- item_name -->
            <div class="form-group">
                <label for="chat_desc">メッセージを送る</label>
                <input type="text" name="chat_desc" class="form-control">
            </div>
            <!--/ item_name -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/postscomment') }}">Back</a>
            </div>
            
            <!-- id 値を送信 -->
            <input type="hidden" name="to_user_id" value="{{$user->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        <form>
            
        <!-- チャット履歴 -->
        <tbody>
                        @foreach ($chats as $chat)
                            <tr>
                                 <!-- コメント詳細 -->
                                <td class="table-text">
                                    <div>{{ $chat->chat_desc }}</div>
                                </td>
				                <!-- 投稿者名の表示 -->
                                <td class="table-text">
                                @if (Auth::id()==$chat->from_user_id)
                                    <div>{{ Auth::user()->name }}</div>
                                @else
                                    <div>{{ $user->name }}</div>
                                @endif
                                </td>
                            </tr>
                        @endforeach
        </tbody>
            
    </div>
</div>
@endsection