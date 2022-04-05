<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
  
        <!--　送信ボタン -->
        <form action="{{ url('schedule/register') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        スケジュール連動
                    </button>
                </div>
            </div>
        </form>
  
@endsection
   