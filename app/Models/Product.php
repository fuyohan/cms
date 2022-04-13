<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // buysテーブルとのリレーション （主テーブル側）
     public function buys() {
        return $this->hasMany('App\Models\Buy');
    }
    
    use HasFactory;
}
