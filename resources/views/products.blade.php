<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <title>ハツラツ</title>
</head>

 <div class=fullscreen>
    <!--↑↑ 検索フォーム ↑↑-->
    @if (count($products) > 0)
                    <!-- 商品全体 -->
                    <div class="product_all">
                        @foreach ($products as $product)
                        <div class="product_block">
                         
				                <!-- 商品写真 -->
				                <div class="product_img">
				                @if($product->product_desc)
				                <img src="/image/{{ $product->product_desc }}" style="max-width:100%; max-height:300px;">
				                @endif
				                </div>
				                
				                <div Class="product_under">
    				                <!-- 投稿タイトル -->
                                    <div class="product_title">
                                        <div>{{$product->product_name}}</div>
                                    </div>
                                    
                                    <div Class="product_button">
        	                           <!-- 詳細ボタンの表示 -->
                                        <div class="product_detail">
                                          <form action="{{ url('productsdetail/'.$product->id) }}" method="GET"> 
                                            {{ csrf_field() }}
                                            <button type="submit" class="test_submit">購入ページへ</button>
        	                                </form>
        	                             </div>
                                    </div>
                        </div>
                        @endforeach
                     </div>
    @endif
</div>
@endsection