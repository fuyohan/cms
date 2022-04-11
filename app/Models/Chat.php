<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    // Userテーブルとのリレーション （従テーブル側）
    public function from_user() {
        return $this->belongsTo('App\Models\User','from_user_id');
    }
    
    // Userテーブルとのリレーション （従テーブル側）
    public function to_user() {
        return $this->belongsTo('App\Models\User','to_user_id');
    }
    use HasFactory;
}
