<!-- 投稿者の写真 --> 
<!--ブラウザでサイト表示の場合は相対パスだけでアクセス可能。メールに添付の場合は絶対パスにする必要あり。環境がかわっても表示されるようにenv("APP_URL")としている。-->
<!-- Cloud 9の仮想サーバー上では表示されないが、デプロイしたら表示されるはず --> 
<div class="post_full_screen">
    @include('common.errors')
        <!--左エリア-->
        <div class="post_left_side">
        
            <div class="post_01">
                @if($post->img_url)
				<img src="{{env("APP_URL")}}/uploads/{{ $post->img_url }}" style="max-width:100%; max-height:500px;">
				@endif
            </div>
            
            <div class="post_02">
             <div class="post_title_for_detail">投稿者：{{ $post->user->name }}さん</div>
			 <div class="post_user_image"><img src="{{env("APP_URL")}}/uploads/{{ $post->user->img_url }}" width="60px" height="60px"></div>
            </div>
           
            <div class="post_02">
              <div class="post_title_for_detail">レシピ名</div>
              <div class="post_02_desc">{!!nl2br(e($post->post_desc_title))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">レシピ概要</div>
              <div class="post_02_desc">{!!nl2br(e($post->post_desc))!!}</div>
            </div>
            
            <div class="post_02">
              <div class="post_title_for_detail">詳細を見る</div>
              <div class="post_02_desc">https://cheesey.sakura.ne.jp/</div>
            </div>
            
        </div>
</div>