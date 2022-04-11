<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
  
        <!--　送信ボタン -->
        <!--<form action="{{ url('schedule/register') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        スケジュール連動
                    </button>
                </div>
            </div>
        </form> -->
        
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
   