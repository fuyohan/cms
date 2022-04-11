@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
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
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/postscomment') }}">Back</a>
            </div>
             <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$post->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        <form>
    </div>
</div>
@endsection