<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pro', 
        'img_url',
        'sex',
        'intro', 
        'skill',
        'purpose', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    // Postsテーブルとのリレーション （主テーブル側）
     public function posts() {
        return $this->hasMany('App\Models\Post');
    }
    
    // Postsテーブルとの多対多リレーション
     public function favo_posts() {
        return $this->belongsToMany('App\Models\Post');
    }
    
    // Hpsテーブルとのリレーション （主テーブル側）
     public function hps() {
        return $this->hasMany('App\Models\Hp');
    }
    
    // buysテーブルとのリレーション （主テーブル側）
     public function buys() {
        return $this->hasMany('App\Models\Buy');
    }
    
    // Chatsテーブルとのリレーション （主テーブル側）
    public function from_chats() {
        return $this->hasMany('App\Models\Chat','from_user_id');
    }
    
    // Hpsテーブルとのリレーション （主テーブル側）
    public function to_chats() {
        return $this->hasMany('App\Models\Chat','to_user_id');
    }
    
    // ユーザーテーブルとのリレーション（自分をフォローしてくれる人を紐づける）、第二引数はテーブル名、第三引数はフォローされている人のID（主）、第四引数はその人をフォローしている人のID（従）：多対多のリレーションの一つの表し方
    public function followers() {
        return $this->belongsToMany('App\Models\User','follow','followee_id','follower_id');
    }
    
    // ユーザーテーブルとのリレーション（自分をフォローしてくれる人を紐づける）、第二引数はテーブル名、第三引数はフォローしている人のID（主）、第四引数はその人によってフォローされている人のID（従）：多対多のリレーションの一つの表し方
    public function followees() {
        return $this->belongsToMany('App\Models\User','follow','follower_id','followee_id');
    }
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
