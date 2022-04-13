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

//TOPページ表示
Route::get('/', [PostsController::class, 'top']);

//投稿一覧表示
Route::get('/posts', [PostsController::class, 'index']);

//投稿フォーム表示
Route::get('/input', [PostsController::class, 'input']);

//投稿処理
Route::post('posts', [PostsController::class, 'store']);

//お気に入りにする処理
Route::post('post/{post_id}', [PostsController::class, 'favo']);

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

//ユーザー一覧表示
Route::get('/users', [PostsController::class, 'userindex']);

//hp投稿一覧表示
Route::get('/hp', [HpsController::class, 'index']);

//hp投稿フォーム表示
Route::get('/hpinput', [HpsController::class, 'input']);

//hp投稿処理
Route::post('hppost', [HpsController::class, 'store']);

//商品一覧表示
Route::get('/products', [ProductsController::class, 'index']);

//商品詳細画面表示
Route::get('/productsdetail/{product}',[ProductsController::class, 'detail']);

//購入＋product tableの在庫を減らす処理
Route::post('/buy', [ProductsController::class, 'buy']);


//スケジュール登録フォーム表示
Route::get('/schedule', [ScheduleController::class, 'input']);

//スケジュール登録処理
Route::post('/schedule/register', [ScheduleController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
