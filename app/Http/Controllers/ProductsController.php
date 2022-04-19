<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use App\Models\Buy;//この行を上に追加
use App\Models\Comment;//この行を上に追加
use App\Models\Product;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('products',[
            'products'=> $products,
            ]);
    }
    
    public function detail(Product $product) //にだんがまえ前の仕様
    {
        $products = Product::get();
        return view('productsdetail',[
            'product'=>$product, //bladeに対してpostテーブル（レコード1本だけ）のデータを渡す
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
         return view('buycomplete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        //以下に登録処理を記述（Eloquentモデル）
        $buy = new Buy;
        $buy->user_name = Auth::user()->name;
        $buy->user_id = Auth::id();
        $buy->product_id = $request->product_id;
        $buy->nos = $request->nos;
        $buy->save();
        
        $product=Product::find($request->product_id); //productのidをfindの引数として渡すことによって、productのレコード1行分の情報を取れる。findが無ければproduct_idしか受け取れない
        $product->decrement("product_stock",$request->nos); //数値を減らすメソッド。第一引数、減らすカラム名。第二引数：減らす個数。
    
        $data = [ "mode" => "buy", "product_name" => $product->product_name, "email"=>Auth::user()->email];
        
        $transApiUrl = 'https://script.google.com/macros/s/AKfycbzMwxIls-d2cMGmUp3TdvfVDSLjnZbjlBjkUXGRORp0x8HNb18vnEm6kuO1w8tNi3M/exec';

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_URL, $transApiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
    
        
        return redirect('/buycomplete');
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
