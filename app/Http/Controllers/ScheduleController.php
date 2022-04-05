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
        $transApiUrl = 'https://script.google.com/macros/s/AKfycbyvKMFB4rzzBvyjDwbCRWSnSyAsfgR_JNr8mZKGM-wIWX391vtLfSoFTtcBCjv4rot8/exec';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $transApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    
}
