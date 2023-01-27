<?php
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\Buy;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;//追記
use App\Http\Controllers\ImgController;//追記
use App\Http\Controllers\ImginputController;//追記
use App\Http\Controllers\HpsController;//追記
use App\Http\Controllers\ScheduleController;//追記
use App\Http\Controllers\ChatsController;//追記
use App\Http\Controllers\ProductsController;//追記
use App\Http\Controllers\ProfileController;//追記

Route::group(['middleware' => 'auth'], function () { //ログインしていないと表示されないページはこの中に入れる。
    //投稿フォーム表示
    Route::get('/input', [PostsController::class, 'input']);
    
    Route::get('/product_input', [ProductsController::class, 'input']);
});

//TOPページ表示
Route::get('/', [PostsController::class, 'top_new_kenko']);

//TOPページ表示(女性)
Route::get('/female', [PostsController::class, 'top_female']);

//投稿一覧表示
Route::get('/posts', [PostsController::class, 'index']);

//hp向上専用投稿一覧表示
Route::get('/hp_posts', [PostsController::class, 'hpindex']);

//投稿処理
Route::post('posts', [PostsController::class, 'store']);

//投稿をお気に入りにする処理 （URLの一部としてpost_idを入れている＝Bladeのボタンにidが埋め込まれており、そのidが飛んでくる）
Route::post('post/{post_id}', [PostsController::class, 'favo']);

//投稿をお気に入りを外す処理
Route::post('postfavodelete/{post_id}', [PostsController::class, 'favodelete']);

//更新画面表示
Route::get('/postsedit/{post}',[PostsController::class, 'edit']);

//更新処理
Route::post('/posts/update',[PostsController::class, 'update']);

//詳細画面表示
Route::get('/postsdetail/{post}',[PostsController::class, 'detail']);

//詳細画面に対するコメント画面表示
Route::get('/postscomment/{post}',[PostsController::class, 'comment']);

//詳細画面に対するコメント
Route::post('postsdocomment',[PostsController::class, 'docomment']);

//ちゃっと画面表示
Route::get('/chats/{user}',[ChatsController::class, 'chat']);

//ちゃっと投稿
Route::post('dochats',[ChatsController::class, 'store']);

//プロフィール画像アップロード画面表示
Route::get('/img', [ImgController::class, 'index']);

//プロフィール画像アップロード処理
Route::post('/img/upload',[ImgController::class, 'upload']);

//ユーザー一覧表示（男性用＆女性用を纏めたもの）
Route::get('/users', [ChatsController::class, 'userindex']);

//相互フォローユーザーの一覧表示（男性用＆女性用を纏めたもの）
Route::get('/users_follow', [ChatsController::class, 'user_follow_index']);

//ユーザーをお気に入りにする処理 （URLの一部としてuser_idを入れている＝Bladeのボタンにターゲットユーザーのidが埋め込まれ、そのidが飛んでくる）
Route::post('follow/{user_id}', [ChatsController::class, 'follow_user']);

//hp投稿一覧表示
Route::get('/hps', [HpsController::class, 'index']);

//hp投稿フォーム表示
Route::get('/hpinput', [HpsController::class, 'input']);

//hp投稿処理
Route::post('hppost', [HpsController::class, 'store']);

//商品一覧表示
Route::get('/products', [ProductsController::class, 'index']);

//商品投稿処理
Route::post('product_input', [ProductsController::class, 'store']);

//商品詳細画面表示
Route::get('/productsdetail/{product}',[ProductsController::class, 'detail']);

//購入＋product tableの在庫を減らす処理
Route::post('/buy', [ProductsController::class, 'buy']);

//購入完了画面表示
Route::get('/buycomplete', [ProductsController::class, 'complete']);

//スケジュール登録フォーム表示
Route::get('/schedule', [ScheduleController::class, 'input']);

//スケジュール登録処理
Route::post('/schedule/register', [ScheduleController::class, 'store']);

Auth::routes();


//プロフィール表示
Route::get('/profile', [ProfileController::class, 'show']);

//プロフィール更新
Route::post('/profile', [ProfileController::class, 'update'])->name('profile');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
