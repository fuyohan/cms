@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
            <!-- item_name -->
            <div class="form-group">
                <label for="product_title">Title</label>
                <div>{{$product->product_title}}"</div>
                
                <label for="product_desc">内容</label>
                <div>{{$product->product_desc}}"</div>
                
                <label for="img">写真</label>
				@if($product->img_url)
				<img src="/image/{{ $product->img_url }}" style="max-width:200px; max-height:200px;">
				@endif
            </div>
            
            <form action="{{ url('/buy') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                個数
                <div class="col-sm-6">
                    <select name="nos" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <!--　購入ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        購入
                    </button>
                </div>
            </div>
            <!-- id 値を送信 -->
            <input type="hidden" name="product_id" value="{{$product->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
            
        </form>
            
    </div>
</div>
@endsection