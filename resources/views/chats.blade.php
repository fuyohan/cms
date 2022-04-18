@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-11">
        
         <div class="post_01">
                @if($user->img_url)
				<img src="/uploads/{{ $user->img_url }}" style="max-width:100%; max-height:500px;">
				@endif
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">自己紹介</div>
              <div class="post_02_desc">{!!nl2br(e($user->intro))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">壁打ちを受けたい・受けられること</div>
              <div class="post_02_desc">{!!nl2br(e($user->skill))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">自分が壁打ちしたいこと</div>
              <div class="post_02_desc">{!!nl2br(e($user->purpose))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">タグ</div>
              <div class="post_02_desc">{!!nl2br(e($user->tag))!!}</div>
            </div>
            
    </div>
    <div class="col-md-12">
    @include('common.errors')
        <!-- チャット履歴 -->
        <div class="col-md-13">
                        <div class="user_head">
                            <div class="head_image"><img src="/uploads/{{ $user->img_url }}" style="max-width:100%; max-height:200px;"></div>
                            <div class="user_name"><span>{{ $user->name}}</span></div>
                        </div>
        </div>
        <div class="col-md-14">
                        <ul class="chat_list">
                        @foreach ($chats as $chat)
                                @if (Auth::id()==$chat->from_user_id)
                                <li class="from_user_box">
                                        <!-- 自分のメッセージ -->
                                        <p class="table-text">{{ $chat->chat_desc }}</p>
                                </li>
                                @else
                                <li class="to_user_box">
                                        <!-- 相手のメッセージ -->
                                        <div class="to_user_chat">
                                        <div class="image-box image-box-profile"><img src="/uploads/{{ $user->img_url }}" width="60px" height="60px"></div>
                                        <p class="table-text">{!!nl2br(e($chat->chat_desc))!!}</p>
                                        </div>
                                </li>    
                                @endif
                        @endforeach
                        </ul>
        </div>
        <div class="col-md-15">
            <form action="{{ url('dochats') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- item_name -->
                <div class="chat-write">
                    <!-- <input type="text" name="chat_desc" class="form-control" placeholder="メッセージを入力してください" cols="50" rows="10">-->
                    <textarea  class="form-control" type="text" name="chat_desc" rows="5" placeholder="メッセージを入力してください">
                    メッセージを入力してください。
                    </textarea>
                </div>
                <!--/ item_name -->
                <!-- Save ボタン/Back ボタン -->
                <div class="submit">
                    <button type="submit" class="submit">送信</button>
                </div>
                <!-- id 値を送信 -->
                <input type="hidden" name="to_user_id" value="{{$user->id}}" /> <!--/ id 値を送信 -->
                <!-- CSRF -->
                {{ csrf_field() }}
                <!--/ CSRF -->
            <form>
        </div>
    </div>
</div>
@endsection