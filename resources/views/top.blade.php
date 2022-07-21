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
    @if (Auth::check())
    <div class="full_screen">

    <!--左エリア-->
    @if (Auth::user()->sex=="男性")
    <div class="left_side">
      <!--<div class="main_img" style="background-image: url(/image/glasses.png)"></div>-->
            <div class="proposal_box_01">
              <div class="proposal_left">
                <div class="proposal_text_left"><a href="./products">男性ホルモン唾液検査</a></div>
              </div>
            </div>
            <div class="proposal_box_02">
              <div class="proposal_left">
                <div class="proposal_text_left"><a href="./posts">ウェルネス・レシピ</a></div>
              </div>
            </div>
            <div class="top-text1">あなたの男性力を<br>測ってみませんか？</div>
    </div>
    @else
    <div class="left_side_female">
      <!--<div class="main_img" style="background-image: url(/image/glasses.png)"></div>-->
            <div class="proposal_box_01_female">
              <div class="proposal_left">
                <div class="proposal_text_left"><a href="./posts">ウエルネス・レシピ</a></div>
              </div>
            </div>
            
            <div class="top-text1">最適なホルモンバランス<br>を手に入れよう！</div>
            <!--<div class="proposal_box_03">
              <div class="proposal_right_01">
                <div class="proposal_text_right"><a href="./posts">みんなの<br>ウェルネス</a></div>
              </div>
            </div>-->
            <!--<div class="proposal_box_02__female">
              <div class="proposal_left">
                <div class="proposal_text_left"><a href="./hp_posts">HP向上プラン</a></div>
              </div>
            </div>-->
            
    </div>
    @endif
  
      <!--右エリア -->
      <div class="right_side">
       
            
            
            <!--<div class="proposal_box_03">
              <div class="proposal_right_01">
                <div class="proposal_text_right"><a href="./posts">みんなの<br>ウェルネス</a></div>
              </div>
            </div>-->
            <div class="top-text2">異性ビジネスパーソンとの<br>ビジネスコミュニケーションで<br>ホルモン活性化</div>
            <div class="proposal_box_04">
              <div class="proposal_right_02">
                <div class="proposal_text_right">
                  @if (Auth::user()->sex=="男性")
                  <a href="./users">ホル<br>マッチング</a>
                  @else
                  <a href="./users_female">ホル<br>マッチング</a>
                  @endif
              </div>
            </div>
            
      </div>
  </main>
   @else
   
   <div class="container_login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
   
   @endif

  <!--<footer class="footer-text-center">
    <div class="wrapper">
      <a href="#" class="btn-pagetop" id="btn"><span class="fa fa-angle-up icon-up"></span></a>
      <!--<small class="copyrights">copyrights 2022 Hatsuratsu All RIghts Reserved.</small>
    </div>
  </footer>-->
@endsection