@extends('layouts.app')
@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <title>ハツラツ</title>

<body class="body">
  <main>
    <div class="full_screen_new">
      
        <div class="top-text2"></br></div>
        
        <div class="proposal_box">
              <div class="proposal_box_05">
                <div class="proposal_05">
                  <div class="proposal_text"><a href="./posts">アクティビティ<br>に参加</a></div>
                </div>
              </div>
              
              <div class="proposal_box_06">
                <div class="proposal_06">
                  <div class="proposal_text">
                    <a href="./hps">健康を振り返る</a>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </main>
</div>

<div class=fullscreen>
    <div class="post_top_02"> Wellness Incentive <br> 健康アクションスコアで商品・サービスをお得利用 </div>
    
     @if (count($products) > 0)
      <!-- 記事全体 -->
      <div class="post_all_02">
        
        @foreach ($products as $product)
        <div class="post_block_02">
				    <!-- 投稿写真 -->
				    <div class="product_img">
				    @if($product->img_url)
				        <img src="/uploads/{{ $product->img_url }}" style="max-width:80%; max-height:80%;">
				        <form action="{{ url('productsdetail/'.$product->id) }}" method="GET"> 
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary">詳細</button>
        	       </form>
				    @endif
				    </div>
				    
				    <!--<div class="post_under">
              <div class="post_title">
                  <div>{{ $product->product_name }}</div>
              </div>
 
              <div class="post_button">
                  <div class="post_detail">
                    <form action="{{ url('prouctdetail/'.$product->id) }}" method="GET"> 
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">詳細</button>
        	          </form>
        	        </div>
              </div>-->
        </div>
        @endforeach
      </div>
      @endif
</div>
  
<footer class="footer-text-center">
    <div class="wrapper">
      <a href="#" class="btn-pagetop" id="btn"><span class="fa fa-angle-up icon-up"></span></a>
      <small class="copyrights">copyrights 2023 MC-wellbeing All RIghts Reserved.</small>
    </div>
</footer>
@endsection