<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//この行を上に追加
use App\Models\Chat;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    //{
        //
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function chat(User $user)
    {
        
        $chats = Chat::orderBy('created_at', 'asc')->where(function ($query) use($user) {
            $query->where('from_user_id', Auth::id())->where('to_user_id', $user->id);
        })->orwhere(function ($query) use($user){
            $query->where('to_user_id', Auth::id())->where('from_user_id', $user->id);
        })->get();
        
        return view('chats',[
            'user'=>$user, //bladeに対しuserテーブル（レコード1本だけ）のデータを渡す
            'chats'=>$chats 
        ]);
    }
     
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
        $chat = new Chat;
        // Eloquent モデル
        $chat->chat_desc = $request->chat_desc; 
        $chat->from_user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $chat->to_user_id= $request->to_user_id;//ここでログインしているユーザidを登録しています
        $chat->save(); 
        return redirect('/chats/'.$request->to_user_id);
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
