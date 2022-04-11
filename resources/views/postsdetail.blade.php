@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
            <!-- item_name -->
            <div class="form-group">
                <label for="post_title">Title</label>
                <div>{{$post->post_title}}"</div>
                
                <label for="post_desc">内容</label>
                <div>{{$post->post_desc}}"</div>
                
                <label for="img">写真</label>
				@if($post->img_url)
				<img src="/uploads/{{ $post->img_url }}" style="max-width:200px; max-height:200px;">
				@endif
            </div>
            <!-- コメントボタンの表示 -->
            <form action="{{ url('postscomment/'.$post->id) }}" method="GET"> 
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">コメントする </button>
	        </form>
 
            <!-- コメントされた内容一覧 -->
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                 <!-- コメント詳細 -->
                                <td class="table-text">
                                    <div>{{ $comment->comment_desc }}</div>
                                </td>
				                <!-- 投稿者名の表示 -->
                                <td class="table-text">
                                    <div>{{ $comment->user->name }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
         
    </div>
</div>

 <!-- スケジュール登録フォーム -->
        @if( Auth::check() )
        <form action="{{ url('schedule/register') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                健康法
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                スケジュール
                <div class="col-sm-6">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-sm-6">
                    <input type="time" name="time" class="form-control">
                </div>
            </div>
            
            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        スケジュールに送付
                    </button>
                </div>
            </div>
        </form>
        @endif


@endsection