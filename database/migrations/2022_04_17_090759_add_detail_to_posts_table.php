<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_desc_title')->nullable();//追記！！！;  //カラム追
            $table->string('post_fre_title')->nullable();//追記！！！;  //カラム追加
            $table->string('post_fre_what')->nullable();//追記！！！;  //カラム追加
            $table->string('post_time_title')->nullable();//追記！！！;  //カラム追加
            $table->string('post_time_what')->nullable();//追記！！！;  //カラム追加
            $table->string('video_url')->nullable();//追記！！！
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
