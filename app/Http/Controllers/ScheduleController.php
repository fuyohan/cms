<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post; 

class ScheduleController extends Controller
{
    public function input()
    {
         return view('schedule');
    }
    
     public function store(Request $request)
    {
        $dt = Carbon::parse($request->date." ".$request->time.":00");
        
        $plans=[];
        
        for($i=0; $i<$request->span; $i++){
            $dt->addDay(7);
            $plans[]=$dt->format("Y-m-d\TH:i:s"); //format＝書式。与えられた書式に従って、日付データを文字列に変換する。
        }
        
        $post = Post::find($request->post_id);
        
        foreach($plans as $plan){
            $data = [ "mode" => "schedule", "name" => $post->post_title,  "describe" => $post->post_desc,  "link" => $post->post_fre_title, "video" => $post->video_url, "schedule" => $plan]; //Requestというオブジェクトにデータが入っているから、呼び出す。->はメソッドやプロパティ（文字列ではない）の呼び出し。=>は連想配列の定義（左辺がkey、右辺が値）
        
            $transApiUrl = 'https://script.google.com/macros/s/AKfycbys4WD2hGU_gGLfW04qPEAu3Ta7c5LFd9AXOR7-tB9RTZWMFTyaMfHFKyCnx7Omg3Op/exec';
    
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_URL, $transApiUrl);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $res = curl_exec($ch);
            curl_close($ch);
            
        } 
        
       
        
        return redirect('/');
        //return $res;
       
    }

    
}
