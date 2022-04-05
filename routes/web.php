<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;//追記
use App\Http\Controllers\ImgController;//追記
use App\Http\Controllers\HpsController;//追記
use App\Http\Controllers\ScheduleController;//追記

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TOPページ表示
Route::get('/top', [PostsController::class, 'top']);

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

//画像アップロード画面表示
Route::get('/img', [ImgController::class, 'index']);

//画像アップロード処理
Route::post('/img/upload',[ImgController::class, 'upload']);

//hp投稿一覧表示
Route::get('/hp', [HpsController::class, 'index']);

//hp投稿フォーム表示
Route::get('/hpinput', [HpsController::class, 'input']);

//hp投稿処理
Route::post('hppost', [HpsController::class, 'store']);

//スケジュール登録フォーム表示
Route::get('/schedule', [ScheduleController::class, 'input']);

//スケジュール登録処理
Route::post('/schedule/register', [ScheduleController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
