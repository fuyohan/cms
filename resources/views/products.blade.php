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

  <!--Headerエリア--->
  <header>
    <div class="menu">
      <ul class=nav>
        <li class="li"><a href="./input">ハツラツ生活ナレッジ<br>を投稿</a></li>
        <li class="li"><a href="./hp">今月のマイHP</a></li>
      </ul>
    </div>
  </header>

 <div class=fullscreen>
    <!--↑↑ 検索フォーム ↑↑-->
    @if (count($products) > 0)
                    <!-- 商品全体 -->
                    <div class="product_all">
                        @foreach ($products as $product)
                        <div class="product_block">
                         
				                <!-- 商品写真 -->
				                <div class="product_img">
				                @if($product->img_url)
				                <img src="/image/{{ $product->img_url }}" style="max-width:100%; max-height:400px;">
				                @endif
				                </div>
				                
				                <div Class="product_under">
    				                <!-- 投稿タイトル -->
                                    <div class="product_title">
                                        <div>{{ $product->product_title }}</div>
                                    </div>
                                    
                                    <div Class="product_button">
        	                           <!-- 詳細ボタンの表示 -->
                                        <div class="product_detail">
                                            <form action="{{ url('productsdetail/'.$product->id) }}" method="GET"> 
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">購入ページへ </button>
        	                                </form>
        	                            </div>
                                    </div>
                        </div>
                        @endforeach
                     </div>
    @endif
</div>
@endsection