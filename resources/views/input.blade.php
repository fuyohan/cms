<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
<div class="input-full_screen">
    <div class="input-box">
        <div class="card-title">
            
        <div class="input-top"> 研究領域の紹介 </div>
        <div class="input-top2">  </div>
        
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        
        <div class="input-form">
        <form action="{{ url('posts') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                研究内容を一言（15字以内）で記載。
                <div class="col-sm-6">
                    <input type="text" name="post_title" class="form-control">
                </div>
            </div>
            
            <!-- 投稿本文のタイトル -->
            <div class="form-group">
                研究の詳細をわかりやすく記載。
                <div class="col-sm-6">
                    <input type="text" name="post_desc_title" class="form-control">
                </div>
            </div>
            
            <!-- 投稿の本文 -->
            <div class="form-group">
                企業との連携可能性を3つ以上挙げてください。
                <div class="col-sm-6">
                    <textarea  class="form-control" type="text" name="post_desc" rows="5" placeholder="">

                    </textarea>
                </div>
            </div>
            
            <!-- 頻度 -->
            <div class="form-group">
                企業との連携実績数を教えてください。
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
                希望する共同研究の条件
                <div class="col-sm-6">
                    <select name="post_time_what" multiple>
                        <option value="無償から相談可">無償から相談可能</option>
                        <option value="学生インターン受入希望">学生インターン受入希望</option>
                        <option value="100万円～">100万円～</option>
                        <option value="200万円～">200万円～</option>
                        <option value="300万円～">300万円～</option>
                        <option value="企業名掲載希望">企業名掲載希望</option>
                    </select>
                </div>
            </div>
            
            <!--<div class="form-group">
                チャレンジ期間を教えてください。
                <div class="col-sm-6">
                    <input type="text" name="video_url" class="form-control">
                </div>
            </div>-->
            
            <div class="form-group">
                どのカテゴリーの研究・シーズになりますか？
                <div class="col-sm-6">
                    <select name="categories" multiple> <!--複数選択ができるように-->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                あなたの研究室を代表する写真があれば、ぜひアップロードください <br>
                <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
            </div>

            <div class="form-group">
                研究の概要がわかるYoutube動画があれば、埋め込みリンクを貼り付けてください。
                <div class="col-sm-6">
                    <input type="text" name="video_url" class="form-control">
                </div>
            </div>
        


            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </div>
        </form>
        </div>
        @endif
    </div>
</div>
@endsection
   