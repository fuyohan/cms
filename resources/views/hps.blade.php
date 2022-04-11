<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <!-- 全てのhp投稿リスト -->
    
    @if (count($hps) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>hp一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($hps as $hp)
                            <tr>
                                <!-- User ID -->
                                <td class="table-text">
                                    <div>{{ $hp->user_id }}</div>
                                </td>
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
    
    <canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	
	<!-- グラフを描画 -->
	//配列をバラす。
   <script>
	//ラベル
	var labels = [
		"2020年1月",
		"2020年2月",
		"2020年3月",
		"2020年4月",
		"2020年5月",
		"2020年6月",
	];
	
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
					label: 'hp値',
					data: hp,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
			]
		},
		options: {
			title: {
				display: true,
				text: 'hpログ'
			}
		}
   });
   </script>
    
    @endif
    
@endsection