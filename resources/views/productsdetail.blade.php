@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
            <!-- item_name -->
            <div class="product_box">
                
                <div class="product_name"><h1>{{$product->product_name}}</h1></div>
    
                <div class="product_desc">{{$product->product_desc}}</div>
                
                <div class="product_img">
    				@if($product->img_url)
    				<img src="/image/{{ $product->img_url }}" style="max-width:200px; max-height:200px;">
    				@endif
			    </div>
             </div>
            
            <form action="{{ url('/buy') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                <h2>ご購入の個数を選択ください。</h2>
                <div class="col-sm-6">
                    <select name="nos" class="form-control">
                        <option value="1">1回セット</option>
                        <option value="2">2回セット</option>
                        <option value="3">3回セット</option>
                        <option value="4">4回セット</option>
                        <option value="5">5回セット</option>
                    </select>
                </div>
            </div>

            <!--　購入ボタン -->
            <div class="product_detail">
                <button type="submit" class="test_submit">
                <a href="./buycomplete">購入する</a>
                </button>
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