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
      
        <div class="top-text2">仲間の健康活動を応援しよう！！</div>
        
        <div class="proposal_box">
              <div class="proposal_box_05">
                <div class="proposal_05">
                  <div class="proposal_text"><a href="./posts">応援する</a></div>
                </div>
              </div>
              
              <div class="proposal_box_06">
                <div class="proposal_06">
                  <div class="proposal_text">
                    <a href="./users">繋がる</a>
                  </div>
                </div>
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