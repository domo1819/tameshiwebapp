<!doctype html>
<html lang="ja"><!--  htmlでここから記述する -->
	<head><!--  コンピューターが見る内容を記述 -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			検索サイト
		</title>
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<script type="text/javascript" src="./jquery-3.6.0.min.js"></script>
			<script type="text/javascript" src="./main.js"></script>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body><!--  人間が見る内容を記述 -->
		<div class="wrapper">
			<header>
					<?php
					header("Cache-Control:no-cache,no-store,must-revalidate,max-age=0");
					header("Pragma:no-cache");
				?>
				<h1 id="top">違反検索サイト</h1>
				<ul>
					<li>
						<a href="#engine">
							検索エンジン</a>
					</li>
					<li>
						<a href="#pp">プライバシーポリシー</a>
					</li>
					<li>
						<a href="#terms">ご利用規約</a>
					</li>
				</ul>
			</header>
			<main>
				<div class="top1">
					<h2>違反検索サイトのトップページです。</h2>
					<p>上部メニューの『検索エンジン』からデータの検索が行えます</p>
				</div>
				<div class="engine2">
					<h2 id="engine">データ検索</h2>
					<p>検索したい項目を下記より選び、検索ボタンをクリックすると該当する結果が表示されます</p>
					<form method="POST" action="index.php">
						<div class="engine2">
						<?php
						$sel = isset($_POST['emp']) ? $_POST['emp'] : '';
						?>
							<label>検索項目</label>
							<select name="emp" id="selbox" onchange="change();">
								<option value="disable" >選択してください</option>
									<optgroup label="検索項目">
										<option value="all" >全件検索</option>
										<option value="date">日付検索</option>
										<option value="word" >単語検索</option>
									</optgroup>
									<optgroup label="地方項目">
										<option value="つくば" >つくば</option>
										<option value="越谷" >越谷</option>
									</optgroup>
							</select><br><br>
							<label id="txt1" style="display:none">日付検索(検索項目の日付検索を選択してから日付を指定してください)</label>
							<input type="date" id="da" name="data" style="display:none"><br><br>
									<label id="txt2" style="display:none">単語検索(検索項目の単語検索を選択してから入力してください)</label>
									<input type="text" id="search_text" name="word" placeholder="検索語を入力してください" style="display:none">
									<br><br><br>
									<div class="engine">
							<input type="submit"  name="submit" value="検索" id="submit" style="width:10%;padding:10px;font-size:20px; background-color:#00c4ff; color:#FFF; margin-bottom:10px;">
							</div>
						</div>
					</form>
				</div>
				<input type="button" class="btn_ex11" value="表を表示" style="width:10%;padding:10px;font-size:18px; background-color:#00c4ff; color:#FFF; margin-bottom:10px;">
				<?php
						$emp = '';
						$data = '';
						if (isset($_POST['emp']) === TRUE) {
								$emp = $_POST['emp'];
						}
						if(isset($_POST['data']) === TRUE) {
							$data = $_POST['data'];
						}
						if(isset($_POST['word']) === TRUE) {
							$word = $_POST['word'];
						}
						$emp_data = array();
						$conn = pg_connect(getenv("DATABASE_URL"));
						// 接続成功した場合
						if ($conn) {
							// 文字化け防止
							pg_set_client_encoding("UTF-8");

							$result = pg_query($conn, "SELECT a.id, a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, a.longitude, a.latitude, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id ORDER BY a.id ASC"); 
							

							if ($emp !== 'all'){
								$result = pg_query($conn, "SELECT a.id, a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, a.longitude, a.latitude, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id WHERE c.region_name = '$emp'");
							} 
							if ($emp == 'date'){
								$result = pg_query($conn, "SELECT a.id, a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, a.longitude, a.latitude, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id WHERE a.timestamp LIKE '%$data%'");
							} 
							if($emp == 'word'){
								$result = pg_query($conn, "SELECT a.id, a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, a.longitude, a.latitude, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id WHERE a.timestamp LIKE '%$word%' OR h.belong_name LIKE '%$word%' OR c.region_name LIKE '%$word%' OR b.car_classify_hiragana LIKE '%$word%' OR b.car_number LIKE '%$word%' OR f.afk_mode LIKE '%$word%'");
							} 
							$arr = pg_fetch_all($result);
							// 結果セットを開放します
							pg_free_result($result);
							// 接続を閉じます
							pg_close($conn);
							// 接続失敗した場合
							} else {
								print 'DB接続失敗';
							}
					?>
					<script>
						$(function(){
								$('.btn_ex11').click(function(){
										$('table').show();
								});
						});
						</script>
					<table border=1 id="ta" style="display:none">
						<tr>
							<th>ID</th>
							<th>日時</th>
							<th>所属名</th>
							<th>地域名</th>
							<th>分類番号(番号)</th>
							<th>分類番号(ひらがな)</th>
							<th>車番号</th>
							<th>緯度</th>
							<th>経度</th>
							<th>罰金額</th>
							<th>違反態様</th>
							<th>支払い状況</th>
						</tr>
						<?php
						foreach($arr as $rows){
							echo "<tr>\n";
							foreach($rows as $value){
								printf("<td>" .$value. "</td>\n");
							}
						}
						?>
			    </table>
					<script type="text/javascript">
					function change() {
							if (document.getElementById("selbox")) {
									selboxValue = document.getElementById("selbox").value;
									if (selboxValue == "date") {
											//文字1を表示
											document.getElementById("txt1").style.display = "";
											//input1を表示
											document.getElementById("da").style.display = "";
											//文字2を非表示
											document.getElementById("txt2").style.display = "none";
											//input2を非表示
											document.getElementById("search_text").style.display = "none";
									} else if (selboxValue == "word") {
											//文字2を表示
											document.getElementById("txt2").style.display = "";
											//input2を表示
											document.getElementById("search_text").style.display = "";
											//文字1を非表示
											document.getElementById("txt1").style.display = "none";
											//input1を非表示
											document.getElementById("da").style.display = "none";
									}
							}
					}
					</script>
				<div class = "pp3">
				<h2 id = "pp">プライバシーポリシー</h2>
					<p>
						◆はじめに
						本プロジェクトのサイトは、個人情報の取り扱いにおいて、下記のように定めます。<br>

						以下のプライバシーポリシーでは、個人情報の取得・利用・管理について記載しております。<br>
						サービス利用にあたり、個人情報保護方針をお読みになり、ご理解いただけますと幸いです。
					</p>
				</div>
				<div class = "terms4">
					<h2 id = "terms">ご利用規約</h2>
				</div>
			</main>
			<footer>
							<div class="pagetop"><a href="#top">▲</a></div>
			</footer>
		</div>
		<script type="text/javascript">
					$(document).ready(function() {
						var button = $('.pagetop');
							$(window).scroll(function () {
								if ($(this).scrollTop() > 100) {
									button.fadeIn(); }
									else {button.fadeOut();}
								});
								button.click(function () {
									$('body, html').animate({ scrollTop: 0 }, 1000);
									return false; });
					});
		</script>
	</body>
</html>
