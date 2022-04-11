<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 投稿テーブルとのリレーション （従テーブル側）
    public function post() {
        return $this->belongsTo('App\Models\Post');
    }
    
    // Userテーブルとのリレーション （従テーブル側）
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
    
}
