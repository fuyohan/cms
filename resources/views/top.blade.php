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

  <!--Headerエリア--->
  <header>
    <div class="top">
      <div class="top-under">
        <h1 class="logo"><a href="./Kenko-top.html"><img src="./img/PAGE LOGO.png" alt="ロゴ" width=100px
              height=100px></a></h1>
        <h1 class="letter">ハツラツ<br>
          <div class="small">前向きなチャレンジで健康予防に</div>
        </h1>
      </div>
    </div>

    <div class="menu">
      <ul class=nav>
        <li class="li"><a href="Kenko-chat.html">健康ナレッジ<br>を投稿</a></li>
        <li class="li"><a href="">健康<br>スケジューリング</a></li>
        <li class="li"><a href="">健診を控えている方は<br>こちらへ！</a></li>
      </ul>
    </div>
  </header>

  <main>

    <div class="full_screen">

      <!--左エリア-->
      <div class="left_side">
        <div class="top-image-box">
          <div class="top-text">
            <div class="top-text1">あなたに合った「健康」を見つけよう</div>
            <div class="top-text2">「会社員」に寄り添った健康ナレッジをご提供します！</div>
            <div class="proposal_box">
              <div class="proposal">
                <div class="proposal_text">
                  <a href="./Kenko-proposal new.html">健診を受けた方はこちらへ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--右エリア -->
      <div class="right_side">
        <div class="top-image-box">
          <div class="top-text">
            <div class="top-text1">あなたに合った「健康」を見つけよう</div>
            <div class="top-text2">「会社員」に寄り添った健康ナレッジをご提供します！</div>
            <div class="proposal_box">
              <div class="proposal">
                <div class="proposal_text">
                  <a href="./Kenko-proposal new.html">健診を受けた方はこちらへ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


        

  </main>

  <footer class="footer-text-center">
    <div class="wrapper">
      <a href="#" class="btn-pagetop" id="btn"><span class="fa fa-angle-up icon-up"></span></a>
      <small class="copyrights">copyrights 2021 minnnano_kenkokatsudo All RIghts Reserved.</small>
    </div>
  </footer>
@endsection