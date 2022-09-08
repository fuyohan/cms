<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories"; // categoryに勝手に複数形のsが付かないように制御する。
    
     // Postsテーブルとの多対多リレーション
     public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }
}
