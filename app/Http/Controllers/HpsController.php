<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use App\Models\Hp;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class HpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // 全てのhpを取得
        
        $hps = Hp::where("user_id", Auth::id())->orderby("testdate")->get();
        return view('hps',[
            'hps'=> $hps
            ]);
    }
    
    public function input()
    {
        $users = User::get();
        return view('hpinput',[
            'users'=> $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        //以下に登録処理を記述（Eloquentモデル）
        $hps = new Hp;
        $hps->user_id= $request->user_id;
        $hps->hp = $request->hp;
        $hps->testdate = $request->testdate;
        $hps->save();
        
        return redirect('/hp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
