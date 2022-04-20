<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="hpinput">
        <div class="card-title">
            会員HP検査結果 インプットフォーム
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('hppost') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                ユーザーID
                <div class="col-sm-6">
                    <select name="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <!-- 投稿の本文 -->
            <div class="form-group">
                HPの値
                <div class="col-sm-6">
                    <input type="text" name="hp" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                日付
                <div class="col-sm-6">
                    <input type="date" name="testdate" class="form-control">
                </div>
            </div>
            
            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>
@endsection
   