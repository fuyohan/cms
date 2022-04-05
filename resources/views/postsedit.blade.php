@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('posts/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" name="post_title" class="form-control" value="{{$post->post_title}}">
                <label for="post_title">内容</label>
                <input type="text" name="post_desc" class="form-control" value="{{$post->post_desc}}">
            </div>
            <!--/ item_name -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/posts') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$post->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection