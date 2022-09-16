@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マイプロフィール') }}</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                       @csrf
                       
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('性別') }}</label>

                            <div class="col-md-6">
                               <input type="radio" name="sex" value="男性">男性
                               <input type="radio" name="sex" value="女性">女性
                            </div>
                            
                        </div>
                        
                        <!--<div class="row mb-3">
                            <label for="intro" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介を記載ください') }}</label>
                            
                            <div class="col-md-6">
                               <textarea  class="form-control" type="text" name="intro" rows="8" placeholder="自己紹介を記載ください">
                               {{$user->intro}}
                              </textarea>
                            </div>
                           
                        </div>-->
                        
                        <!--<div class="row mb-3">
                            <label for="skill" class="col-md-4 col-form-label text-md-end">{{ __('壁打ちを受けたいテーマ') }}</label>
                            
                            <div class="col-md-6">
                               <textarea  class="form-control" type="text" name="skill" rows="5" placeholder="壁打ちを受けたいテーマを記載ください">
                               {{$user->skill}} 
                               </textarea>
                            </div>
                        </div>-->
                        
                        <!--<div class="row mb-3">
                            <label for="purpose" class="col-md-4 col-form-label text-md-end">{{ __('壁打ちしたいテーマ') }}</label>
                            
                            <div class="col-md-6">
                               <textarea  class="form-control" type="text" name="purpose" rows="5" placeholder="現時点で壁打ちしたいテーマを記載ください">
                               {{$user->purpose}}
                               </textarea>
                            </div>
                        </div>-->
                        
                        <div class="row mb-3">
                            <label for="purpose" class="col-md-4 col-form-label text-md-end">{{ __('プロフィール写真') }}</label>
                            
                            <div class="col-md-6">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input id="fileUploader" type="file" name="img" accept='image/' autofocus>
                        </div>
                        <!--<button type="submit" class="btn btn-primary">送信する</button>-->
                        
                        <!-- 投稿写真 -->
				        <div class="profile_img">
				        @if($user->img_url)
				          <img src="/uploads/{{$user->img_url}}">
				        @endif
				        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('       プロフィール更新       ') }}
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
