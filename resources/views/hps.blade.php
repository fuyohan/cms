<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <!-- 全てのhp投稿リスト -->
    
    @if (count($hps) > 0)
    <div class="chart">
    
         <div class="try_hp"><label class="open" for="pop-up">メンターの<br>フォローを受ける</label></div>
                        
            <input type="checkbox" id="pop-up">
                        
                <div class="overlay">
                    <div style="flex-basis: 500px;">
                    <label class="close" for="pop-up">×</label>
                        
                        <div class="recommend">
                            
                            @if ($hps->last()->hp > 50)
                            
                           
                            <br>テストステロン値は年齢相当です さらにパワーアップしたいかたは、以下の項目に気を付けてください
                            
                            <br>1筋肉を使うことを心がけましょう
                            <br>スクワット、腕立て伏せなど大きな筋肉を使うことにより、テストステロンが上昇します。また会社ではなる
                            <br>べく階段を利用ください 筋トレにはビタミンB群の補充が有効です。
                            
                            <br><br>2食生活に注意しましょう
                            <br>タンパク質(肉、魚)をしっかり取り、ネギやニンニクなどの香味野菜を併せて取ることも効果的です。別紙
                            <br>のテストステロンを上げる食事を参考にしてください 過度な糖質制限はテストステロンを減少し、筋力が
                            <br>低下しますので注意しましょう
                            
                            <br>3マインドフルネス(瞑想)も有効です
                            
                            <br>4仲間を作りましょう
                            <br>学校時代の友達、会社以外の仲間を大事にしましょう
                            <br>ゴルフなどの競技スポーツ、少年野球のコーチなどの地域ボランティアもテストステロンをアップします
                            <div class="hprecomment"><a href="./hp_posts">メニュー実施はこちらから</div>
                                            
                            @else
                            
                            <br>テストステロン値が同世代の平均値よりも低いようです 毎日の活力は十分ですか?
                            
                            <br>1睡眠はとれていますか
                            <br>テストステロンは睡眠時に補充されます。毎日の睡眠をチェックください
                            
                            <br>2情報過剰に注意しましょう
                            <br>PCやスマホを夜遅くまで見ていませんか?なるべく夜21時以降は見ないようにしましょう
                            
                            <br>3職場でストレスを感じていないですか?
                            <br>仕事に行くのがおっくうだったり、会議がつらい、緊張して心臓がどきどきするなどの症状があるとストレス
                            <br>が高い可能性があります。マッサージ、温泉、ヨガやストレッチなどで積極的にリラックスする方法を取りま
                            <br>しょう。
                            
                            <br>4体重が増えていませんか?
                            <br>ズボンのベルトの穴が最近変わったのであれば、テストステロンの低下が続いている可能性があります。
                            <br>筋トレなど積極的に筋肉を使いましょう。
                            
                            <br>5最近日に当たっていますか?
                            <br>日光に当たる機会が少ないと体の中のビタミンDの働きが低下し、テストステロンが下がります
                            <br>日に当たる戸外の活動や、鮭を積極的に食べる、ビタミンDのサプリを摂取しましょう。
                            
                            <br>6最近貝を食べていますか?
                            <br>貝類は亜鉛の貴重な供給源です。亜鉛はテストステロン産生を高めます。ハマグリやシジミ、牡蠣を積極
                            <br>的に食べましょう。
                            
                            <br>7やる気が出ない、疲れを感じる場合は、医療機関にかかりましょう
                            <br>意欲がわかない、疲労がある場合は、医療機関を受診し医師と相談の上、血液中のテストステロン測定
                            
                             <div class="hprecomment"><a href="./hp_posts">メニュー実施はこちらから</div>
                                   
                            @endif
                        </div>

                    </div>
                </div>
                
        <div class="hp_chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	
	<!-- グラフを描画 -->
   <script>
	//ラベル
	
	//var labels = [
	//	"2020年1月",
	//	"2020年2月",
	//	"2020年3月",
	//	"2020年4月",
	//	"2020年5月",
	//	"2020年6月",
	//];
	
	//HPログ
	var hps = @json($hps); //日付とhp値がセットになったデータが渡される
	var hp = hps.map(x => x.hp);
	var testdate = hps.map(x => x.testdate);
	
	//グラフを描画
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: testdate,
			datasets: [
				{
					label: '睡眠スコア',
					data: hp,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
			]
		},
		options: {
			title: {
				display: true,
				text: '睡眠スコア'
			}
		}
   });
   </script>
   
   <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>あなたの睡眠スコア推移</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($hps as $hp)
                            <tr>
                                <!-- User ID -->
                                <!--<td class="table-text">
                                    <div>{{ $hp->user_id }}</div>
                                </td>-->
                                 <!-- hp値 -->
                                <td class="table-text">
                                    <div>{{ $hp->hp }}</div>
                                </td>
				                <!-- 検査日 -->
                                <td class="table-text">
                                    <div>{{ $hp->testdate }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>		
    @endif
    
@endsection