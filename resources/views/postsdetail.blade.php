@extends('layouts.app')
@section('content')

<div class="post_full_screen">
    @include('common.errors')
        <!--左エリア-->
        <div class="post_left_side">
            
            <div class="post_01">
                @if($post->img_url)
				<img src="/uploads/{{ $post->img_url }}" style="max-width:100%; max-height:500px;">
				@endif
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">やることを一言でいうと</div>
              <div class="post_02_desc">{!!nl2br(e($post->post_desc_title))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">私が実際にやっていることの詳細</div>
              <div class="post_02_desc">{!!nl2br(e($post->post_desc))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">週に何回やっている？</div>
              <div class="post_02_desc">{!!nl2br(e($post->post_fre_what))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">毎回何時間かかる？</div>
              <div class="post_02_desc">{!!nl2br(e($post->post_time_what))!!}</div>
            </div>
            
            <div class="post_03">
                <iframe width=50% height=50% 
				src={{$post->video_url}} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
				</iframe>
            </div>
        </div>
    
        <!--右エリア -->
        <div class="post_right_side">
            
            <div class="post_04">
                <div class="post_04_title"><h1>{{$post->post_title}}</h1></div>
                
                <div class="post_04_favo">継続中のユーザー：{{$post->favo_user_count}} 人</div>
                
                <div class="post_04_try">
                        
                        <div class="try"><label class="open" for="pop-up">実践して見る</label></div>
                        
                        <input type="checkbox" id="pop-up">
                        
                        <div class="overlay">
                            <div style="flex-basis: 500px;">
                              <label class="close" for="pop-up">×</label>
                              
                                @if( Auth::check() )
                                <form action="{{ url('schedule/register') }}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}
                                     
                                    <div class="schedule_comment">
                                        コースを選択ください
                                    <select name="span">
                                        <option value="4">4週間コース</option>
                                        <option value="8">8週間コース</option>
                                        <option value="12">12週間コース</option>
                                    </select>
                                    </div><br>
                                    
                                    
                                    <div class="schedule_comment">
                                        いつから始めますか？
                                            <input type="date" name="date" class="form-control">
                                            <input type="time" name="time" class="form-control">
                                    </div><br>
                                    
                                    <!--　登録ボタン -->
                                    <div class="schedule_comment">
                                        <div class="google_button">
                                            <button type="submit" class="btn btn-primary">
                                                Googleカレンダー連動
                                            </button>
                                        </div>
                                    </div>
                                    <!-- postテーブルの1レコード分のid 値をschedule controllerに送信 -->
                                    <input type="hidden" name="post_id" value="{{$post->id}}" /> <!--/ id 値を送信 -->
                                    <!-- CSRF -->
                                    {{ csrf_field() }}
                                     <!--/ CSRF -->
                                </form>
                                @endif
                                
                            </div>
                        
                        </div>
                
                </div>
            
            </div>
            
            <div class="post_05">
                <div class="post_05_comment">
                <!-- コメントされた内容一覧 -->
                <h2>専門家コメント<h2>
                    <ul class="comment_list">
                    @foreach ($comments as $comment)
                    @if ($comment->user->pro==1)
                                <li class="comment-text">
                                    <div class="comment_list_user">
                                      <div class="image_box"><img src="/uploads/{{ $comment->user->img_url }}" width="60px" height="60px"></div>
                                      <h2>{{ $comment->user->name }}</h2>
                                    </div>
                                    
                                    <div class="comment_list_comment">
                                      <p>{{ $comment->comment_desc}}</p>
                                    <div>
                                </li>
                    @endif
                    @endforeach
                    </ul>
                    <br>
                    <br>
                    <h2>ユーザーコメント<h2>
                    <ul class="comment_list">
                    @foreach ($comments as $comment)
                    @if ($comment->user->pro==0)
                                <li class="comment-text">
                                    <div class="comment_list_user">
                                      <div class="image_box"><img src="/uploads/{{ $comment->user->img_url }}" width="60px" height="60px"></div>
                                      <h2>{{ $comment->user->name }}</h2>
                                    </div>
                                    
                                    <div class="comment_list_comment">
                                      <p>{{ $comment->comment_desc}}</p>
                                    <div>
                                </li>
                    @endif
                    @endforeach
                    </ul>
                    
                    
                </div>
                <div class="post_05_comment_button">
                   
                <form action="{{ url('postsdocomment') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- item_name -->
                    <div class="form-group">
                        <label for="comment_desc">コメント</label>
                        <input type="text" name="comment_desc" class="form-control">
                    </div>
                    <!--/ item_name -->
                    <!-- Save ボタン/Back ボタン -->
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">コメントする</button>
                    </div>
                     <!-- id 値を送信 -->
                    <input type="hidden" name="id" value="{{$post->id}}" /> <!--/ id 値を送信 -->
                    <!-- CSRF -->
                    {{ csrf_field() }}
                    <!--/ CSRF -->
                <form>
	            </div>
        	</div>
        	
        </div>
</div>
@endsection