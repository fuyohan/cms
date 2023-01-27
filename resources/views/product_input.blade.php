<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
<div class="input-full_screen">
    <div class="input-box">
        <div class="card-title">
            
        <div class="input-top"> 商品の登録 </div>
        <div class="input-top2">  </div>
        
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        
        <div class="input-form">
        <form action="{{ url('product_input') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 商品のタイトル -->
            <div class="form-group">
             商品を一言（15字以内）で記載。
                <div class="col-sm-6">
                    <input type="text" name="post_title" class="form-control">
                </div>
            </div>
            
        
            <!-- 商品の本文 -->
            <div class="form-group">
                商品の詳細をわかりやすく記載。
                <div class="col-sm-6">
                    <textarea  class="form-control" type="text" name="post_desc" rows="5" placeholder="">

                    </textarea>
                </div>
            </div>
            
            <div class="form-group">
                商品を説明する写真があれば、ぜひアップロードください <br>
                <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
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
   