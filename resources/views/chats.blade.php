@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')

            
        <!-- チャット履歴 -->
        <div>
                        @foreach ($chats as $chat)
                            <div>
				                <!-- 投稿者名の表示 -->
                                <div class="from_user_box" style="display: flex;justify-content: flex-end;/* max-width: 500px; */margin: 0 auto;">
                                @if (Auth::id()==$chat->from_user_id)
                                    <div class="right-chat"> 
                                        <!-- 自分のメッセージ -->
                                        <div class="table-text"><span>{{ $chat->chat_desc }}</span></div>
                                        <!--<div class="table-text" style="text-align:right">
                                            <span>{{ Auth::user()->name }}</span>
                                        </div>-->
                                    <div>
                                @else
                                     <!-- 相手のメッセージ -->
                                    <!--<div class="left-chat"> 
                                    <div class="table-text">
                                        <span>{{ $chat->chat_desc }}</span>
                                    </div>
                                    <div class="table-text" style="text-align:left">
                                        <span>{{ $user->name }}</span>
                                    </div>
                                    </div>-->
                                    <div class="to_user_box" style="display: flex;justify-content: flex-start;/* max-width: 500px; */margin: 0 auto;">
                                        <div class="left-chat" style="/* background-color: #335692; */"> 
                                            <div class="table-image"><img src="/uploads/{{ $user->img_url }}" style="max-width:100%; max-height:200px;"></div>
                                            <div class="table-text"><span>{{ $chat->chat_desc }}</span></div>
                                        </div>
                                    </div>    
                                @endif
                                </div>
                            </div>
                        @endforeach
        </div>
        
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
            
    </div>
</div>
@endsection