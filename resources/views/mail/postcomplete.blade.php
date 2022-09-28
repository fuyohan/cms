    <!-- 投稿者の写真 --> 
    <!--ブラウザでサイト表示の場合は相対パスだけでアクセス可能。メールに添付の場合は絶対パスにする必要あり。環境がかわっても表示されるようにenv("APP_URL")としている。-->
    <!-- Cloud 9の仮想サーバー上では表示されないが、デプロイしたら表示されるはず --> 
        <div class="post_01">
            @if($post->user->img_url)
    			<img src="{{env("APP_URL")}}/uploads/{{ $post->user->img_url }}" style="max-width:100%; max-height:500px;">
    		@endif
        </div>
        
   <!-- 投稿タイトル -->
        <div class="post_title">
         <div>{{ $post->post_title }}</div>
        </div>
    				                
   <!-- 投稿者名の表示 -->
        <div class="table-text">
            <div>{{ $post->user->name }} さん</div>
        </div>
    
