<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    // Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    // Productテーブルとのリレーション （従テーブル側）
     public function product() {
        return $this->belongsTo('App\Models\Product');
    }
    
    use HasFactory;
}
