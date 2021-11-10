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
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body><!--  人間が見る内容を記述 -->
		<div class="wrapper">
			<header>
					<?php
					header("Cache-Control:no-cache,no-store,must-revalidate,max-age=0");
					header("Pragma:no-cache");
				?>
				<h1 id="top">駐車違反情報検索サイト</h1>
				<ul>
					<li>
						<a href="#engine">
							データ検索</a>
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
				<div class="engine2">
					<h2 id="engine">データ検索</h2>
					<p>検索したい項目を下記より選び、検索ボタンをクリックすると該当する結果が検索されます</p>
					<form method="POST" action="home.php">
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
										<option value="いわき" >いわき</option>
										<option value="つくば" >つくば</option>
										<option value="とちぎ" >とちぎ</option>
										<option value="なにわ" >なにわ</option>
										<option value="一宮" >一宮</option>
										<option value="三河" >三河</option>
										<option value="三重" >三重</option>
										<option value="上越" >上越</option>
										<option value="下関" >下関</option>
										<option value="世田谷" >世田谷</option>
										<option value="久留米" >久留米</option>
										<option value="京都" >京都</option>
										<option value="仙台" >仙台</option>
										<option value="伊勢志摩" >伊勢志摩</option>
										<option value="伊豆" >伊豆</option>
										<option value="会津" >会津</option>
										<option value="佐世保" >佐世保</option>
										<option value="佐賀" >佐賀</option>
										<option value="倉敷" >倉敷</option>
										<option value="八戸" >八戸</option>
										<option value="八王子" >八王子</option>
										<option value="出雲" >出雲</option>
										<option value="函館" >函館</option>
										<option value="前橋" >前橋</option>
										<option value="北九州" >北九州</option>
										<option value="北見" >北見</option>
										<option value="千葉" >千葉</option>
										<option value="名古屋" >名古屋</option>
										<option value="和歌山" >和歌山</option>
										<option value="和泉" >和泉</option>
										<option value="品川" >品川</option>
										<option value="四日市" >四日市</option>
										<option value="土浦" >土浦</option>
										<option value="堺" >堺</option>
										<option value="多摩" >多摩</option>
										<option value="大分" >大分</option>
										<option value="大宮" >大宮</option>
										<option value="大阪" >大阪</option>
										<option value="奄美" >奄美</option>
										<option value="奈良" >奈良</option>
										<option value="姫路" >姫路</option>
										<option value="宇都宮" >宇都宮</option>
										<option value="室蘭" >室蘭</option>
										<option value="宮城" >宮城</option>
										<option value="宮崎" >宮崎</option>
										<option value="富士山" >富士山</option>
										<option value="富山" >富山</option>
										<option value="富橋" >富橋</option>
										<option value="尾張小牧" >尾張小牧</option>
										<option value="山口" >山口</option>
										<option value="山形" >山形</option>
										<option value="山梨" >山梨</option>
										<option value="岐阜" >岐阜</option>
										<option value="岡山" >岡山</option>
										<option value="岡崎" >岡崎</option>
										<option value="岩手" >岩手</option>
										<option value="島根" >島根</option>
										<option value="川口" >川口</option>
										<option value="川崎" >川崎</option>
										<option value="川越" >川越</option>
										<option value="市原" >市原</option>
										<option value="市川" >市川</option>
										<option value="帯広" >帯広</option>
										<option value="平泉" >平泉</option>
										<option value="広島" >広島</option>
										<option value="庄内" >庄内</option>
										<option value="弘前" >弘前</option>
										<option value="徳島" >徳島</option>
										<option value="愛媛" >愛媛</option>
										<option value="成田" >成田</option>
										<option value="所沢" >所沢</option>
										<option value="新潟" >新潟</option>
										<option value="旭川" >旭川</option>
										<option value="春日井" >春日井</option>
										<option value="春日部" >春日部</option>
										<option value="札幌" >札幌</option>
										<option value="杉並" >杉並</option>
										<option value="松戸" >松戸</option>
										<option value="松本" >松本</option>
										<option value="柏" >柏</option>
										<option value="横浜" >横浜</option>
										<option value="水戸" >水戸</option>
										<option value="江東" >江東</option>
										<option value="沖縄" >沖縄</option>
										<option value="沼津" >沼津</option>
										<option value="浜松" >浜松</option>
										<option value="湘南" >湘南</option>
										<option value="熊本" >熊本</option>
										<option value="熊谷" >熊谷</option>
										<option value="白河" >白河</option>
										<option value="盛岡" >盛岡</option>
										<option value="相模" >相模</option>
										<option value="知床" >知床</option>
										<option value="石川" >石川</option>
										<option value="神戸" >神戸</option>
										<option value="福井" >福井</option>
										<option value="福山" >福山</option>
										<option value="福岡" >福岡</option>
										<option value="福島" >福島</option>
										<option value="秋田" >秋田</option>
										<option value="筑豊" >筑豊</option>
										<option value="練馬" >練馬</option>
										<option value="群馬" >群馬</option>
										<option value="習志野" >習志野</option>
										<option value="船橋" >船橋</option>
										<option value="苫小牧" >苫小牧</option>
										<option value="葛飾" >葛飾</option>
										<option value="袖ヶ浦" >袖ヶ浦</option>
										<option value="諏訪" >諏訪</option>
										<option value="警察" >警察</option>
										<option value="豊田" >豊田</option>
										<option value="越谷" >越谷</option>
										<option value="足立" >足立</option>
										<option value="那須" >那須</option>
										<option value="郡山" >郡山</option>
										<option value="野田" >野田</option>
										<option value="金沢" >金沢</option>
										<option value="釧路" >釧路</option>
										<option value="鈴鹿" >鈴鹿</option>
										<option value="長岡" >長岡</option>
										<option value="長崎" >長崎</option>
										<option value="長野" >長野</option>
										<option value="青森" >青森</option>
										<option value="静岡" >静岡</option>
										<option value="飛騨" >飛騨</option>
										<option value="飛鳥" >飛鳥</option>
										<option value="香川" >香川</option>
										<option value="高崎" >高崎</option>
										<option value="高松" >高松</option>
										<option value="高知" >高知</option>
										<option value="鳥取" >鳥取</option>
										<option value="鹿児島" >鹿児島</option>
									</optgroup>
							</select><br><br>
							<label id="txt1" style="display:none">日付検索(検索項目の日付検索を選択してから日付を指定してください)</label>
							<input type="date" id="da" name="data" style="display:none"><br><br>
									<label id="txt2" style="display:none">単語検索(検索項目の単語検索を選択してから入力してください)</label>
									<input type="text" id="search_text" name="word" placeholder="検索語を入力してください" style="display:none">
									<br><br><br>
									<div class="engine">
							<input type="submit"  name="submit" value="検索" id="submit" style="width:10%;padding:10px;font-size:20px; background-color:#00c4ff; color:#FFF; margin-bottom:10px; margin-left: 15px;">
							</div>
						</div>
					</form>
				</div>
				<script>
				var slc_elm = document.querySelector("#selbox");

				slc_elm.addEventListener("focus", function(elm){
						if(elm.currentTarget.options.length >= 11){
								elm.currentTarget.size = "10";
						}
				}, false);

				slc_elm.addEventListener("blur", function(elm){
						elm.currentTarget.size = "1";
				}, false);

				slc_elm.addEventListener("change", function(elm){
						elm.currentTarget.blur();
				}, false);
				</script>
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
						};
						$emp_data = array();
						$conn = pg_connect(getenv("DATABASE_URL"));
						
						// 接続成功した場合
						if ($conn) {
							// 文字化け防止
							pg_set_client_encoding("UTF-8");

							if($emp == 'all'){
							$result = pg_query($conn, "SELECT a.id, a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, a.longitude, a.latitude, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id ORDER BY a.id ASC"); 
							}

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
					<p>検索結果を表示するには「表示」を押してください</p>
					<input type="button" class="btn_ex11" value="表示"  style="width:10%;padding:10px;font-size:18px; background-color:#00c4ff; color:#FFF; margin-bottom:10px; margin-left: 15px;">
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