<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
<div class="input-full_screen">
    <div class="input-box">
        <div class="card-title">
            あなたのハツラツを共有しましょう
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('posts') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                投稿のタイトル
                <div class="col-sm-6">
                    <input type="text" name="post_title" class="form-control">
                </div>
            </div>
            
            <!-- 投稿本文のタイトル -->
            <div class="form-group">
                やることを一言でいうと
                <div class="col-sm-6">
                    <input type="text" name="post_desc_title" class="form-control">
                </div>
            </div>
            
            <!-- 投稿の本文 -->
            <div class="form-group">
                実際にやっていることを記載ください
                <div class="col-sm-6">
                    <textarea  class="form-control" type="text" name="post_desc" rows="5" placeholder="実際に行動している内容を入力してください">
                    実際に行動している内容を入力してください
                    
                    例) 
                    ・40代に入って、テニスを始めました 
                    
                    ・●●区のスクールに入り、コーチに教わりながらやっています。
                    
                    ・スクールはこちらになります。
                    https://greenhills.jp/
                    
                    ・スクール
                    
                    </textarea>
                </div>
            </div>
            
            <!-- 頻度 -->
            <div class="form-group">
                週に何回やっていますか？
                <div class="col-sm-6">
                    <select name="post_fre_what">
                        <option value="1">1回</option>
                        <option value="2">2回</option>
                        <option value="3">3回</option>
                        <option value="4">4回</option>
                        <option value="5">5回</option>
                        <option value="6">6回</option>
                        <option value="7">7回</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                毎回どのくらいの時間をかけていますか？
                <div class="col-sm-6">
                    <select name="post_time_what">
                        <option value="1">1時間</option>
                        <option value="2">2時間</option>
                        <option value="3">3時間</option>
                        <option value="4">4時間</option>
                        <option value="5">5時間</option>
                        <option value="6">6時間</option>
                        <option value="7">7時間</option>
                        <option value="8">8時間</option>
                        <option value="9">9時間</option>
                        <option value="10">10時間</option>
                        <option value="11">11時間</option>
                        <option value="12">12時間</option>
                        <option value="13">13時間</option>
                        <option value="14">14時間</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                この健康法を表す写真のアップロードにご協力ください。<br>
                <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
            </div>

            <div class="form-group">
                参考になるYoutube動画があれば、埋め込みリンクを貼り付けてください。
                <div class="col-sm-6">
                    <input type="text" name="video_url" class="form-control">
                </div>
            </div>

            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection
   