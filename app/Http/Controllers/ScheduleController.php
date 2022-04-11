<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function input()
    {
         return view('schedule');
    }
    
     public function store(Request $request)
    {
        
        $data = [ "name" => $request->name, "schedule" => str_replace("/","-",$request->date)."T".$request->time.":00"]; //Requestというオブジェクトにデータが入っているから、呼び出す。->はメソッドやプロパティ（文字列ではない）の呼び出し。=>は連想配列の定義（左辺がkey、右辺が値）
        
        
        $transApiUrl = 'https://script.google.com/macros/s/AKfycbyd1nBz8H4fkL_aLL9vZXanZzcH4aD5U0E0BgTtXazHrvbGd_QjcB6zQmEQ38RN2eZq/exec';

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_URL, $transApiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        
        return redirect('/top');
        //return $res;
       
    }

    
}
