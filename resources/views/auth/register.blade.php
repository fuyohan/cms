@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('プロフィール登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード確認') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="pro" class="col-md-4 col-form-label text-md-end">{{ __('Pro会員登録の場合は「1」と入力ください') }}</label>

                            <div class="col-md-6">
                               <input type="text" name="pro" class="form-control">
                            </div>
                            
                        </div>
                        
                        <div class="row mb-3">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('性別') }}</label>

                            <div class="col-md-6">
                               <input type="radio" name="sex" value="男性">男性
                               <input type="radio" name="sex" value="女性">女性
                            </div>
                            
                        </div>
                        
                        <div class="row mb-3">
                            <label for="intro" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介を記載ください') }}</label>
                            
                            <div class="col-md-6">
                               <textarea  class="form-control" type="text" name="intro" rows="8" placeholder="自己紹介を記載ください">
                               ＜学歴・略歴＞
                               
                               ＜自己紹介＞
                               
                               ＜興味・関心＞
                              </textarea>
                            </div>
                           
                        </div>
                        
                        <div class="row mb-3">
                            <label for="skill" class="col-md-4 col-form-label text-md-end">{{ __('壁打ちを受けたいテーマ') }}</label>
                            
                            <div class="col-md-6">
                               <textarea  class="form-control" type="text" name="skill" rows="5" placeholder="壁打ちを受けたいテーマを記載ください">
                               ＜ユーザーとして＞
                               
                               ＜アドバイザーとして＞
                               
                               ＜共感者として＞
                              </textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="purpose" class="col-md-4 col-form-label text-md-end">{{ __('壁打ちしたいテーマ') }}</label>
                            
                            <div class="col-md-6">
                               <textarea  class="form-control" type="text" name="purpose" rows="5" placeholder="現時点で壁打ちしたいテーマを記載ください">
                               ＜ユーザーとして＞
                               
                               ＜アドバイザーとして＞
                               
                               ＜共感者として＞
                              </textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="purpose" class="col-md-4 col-form-label text-md-end">{{ __('プロフィール写真') }}</label>
                            
                            <div class="col-md-6">

                            </div>
                        </div>
                        
                        <form action="{{ url('/img/upload') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
                            </div>
                            <!--<button type="submit" class="btn btn-primary">送信する</button>-->
                        </form>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('       会員登録       ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
