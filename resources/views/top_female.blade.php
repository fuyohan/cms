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
    <div class="full_screen">

      <!--左エリア-->
    <div class="left_side_female">
      <!--<div class="main_img" style="background-image: url(/image/glasses.png)"></div>-->
            <div class="proposal_box_01_female">
              <div class="proposal_left">
                <div class="proposal_text_left"><a href="./products">To be comming</a></div>
              </div>
            </div>
            <!--<div class="proposal_box_02__female">
              <div class="proposal_left">
                <div class="proposal_text_left"><a href="./hp_posts">HP向上プラン</a></div>
              </div>
            </div>-->
            <div class="top-text1">最適なホルモンバランス<br>を手に入れよう！</div>
    </div>
  
      <!--右エリア -->
      <div class="right_side">
       
            <div class="top-text2">あなたのウェルビーイング<br>が見つかる</div>
            
            <div class="proposal_box_03">
              <div class="proposal_right_01">
                <div class="proposal_text_right"><a href="./posts">みんなの<br>ハツラツ</a></div>
              </div>
            </div>
            
            <div class="proposal_box_04">
              <div class="proposal_right_02">
                <div class="proposal_text_right"><a href="./users_female">かべうち<br>マッチング</a></div>
              </div>
            </div>
      </div>
  </main>

  <footer class="footer-text-center">
    <div class="wrapper">
      <a href="#" class="btn-pagetop" id="btn"><span class="fa fa-angle-up icon-up"></span></a>
      <small class="copyrights">copyrights 2022 Hatsuratsu All RIghts Reserved.</small>
    </div>
  </footer>
@endsection