<!doctype html>
<html lang="ja"><!--  htmlでここから記述する -->
<head><!--  コンピューターが見る内容を記述 -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		検索サイト
	</title>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
						<label>検索項目</label>
						<select id="kind" name="kind">
						  <option value="">選択して下さい</option>
							<option value="1">全件検索</option>
							<option value="2">日付検索</option>
							<option value="3">日時</option>
						</select><br><br>
						<label>住所検索</label>
						<select>
						<?php
								$con = pg_connect(getenv("DATABASE_URL"));
								if (!$con)  {
									exit('データベースに接続できませんでした。');
								}
									$col = pg_query($con, "SELECT region_name FROM region_data ORDER BY region_name;");
									while($data = pg_fetch_array($col)){
									?>
									<OPTION VALUE="<?php $data['region_name'] ?>"><?php echo $data['region_name'] ?></OPTION><?php
									}
									?>
								</select><br><br>	
								<select>
								<?php
										$co = pg_query($con, "SELECT timestamp FROM warn_info ORDER BY timestamp;");
										while($date = pg_fetch_array($co)){
											?>
											<OPTION VALUE="<?php $date['timestamp'] ?>"><?php echo $date['timestamp'] ?></OPTION><?php
											}
										?>
								</select>
								<label>検索単語を入力してください。(空欄の場合は全検索をします。)</label>
								<input type="text" id="search_text" name="word" placeholder="検索語を入力してください">
								<br><br><br>
								<div class="engine">
							<input type="submit"  name="submit" value="検索" style="width:10%;padding:10px;font-size:20px; background-color:#00c4ff; color:#FFF; margin-bottom:10px;">
						</div>
					</div>
				</form>
				<script type="text/javascript">
    /* 子ジャンル（selectC）用の配列 */
    var item = new Array();

        item[0] = new Array();
        item[0][0]="---------------------";

        /* Fruits */
        item[1] = new Array();
        item[1][0]="子ジャンルを選択して下さい";
        item[1][1]="Apple";
        item[1][2]="Banana";
        item[1][3]="Melon";
        item[1][4]="Grape";

        /* Vegitables */
        item[2]= new Array();
        item[2][0]="子ジャンルを選択して下さい";
        item[2][1]="Potato";
        item[2][2]="Carrot";
        item[2][3]="Tomato";

        /* Drinks */
        item[3] = new Array();
        item[3][0]="子ジャンルを選択して下さい";
        item[3][1] = "Splite";
        item[3][2] = "Beer";
        item[3][3] = "Cola";
        item[3][4] = "Coffee";
        item[3][5] = "Milk Tea";

    /* 子ジャンルのID名 */
    var idName="childS";

    /* 親ジャンルが変更されたら、子ジャンルを生成 */
    function createChildOptions(frmObj) {
        /* 親ジャンルを変数pObjに格納 */
        var pObj=frmObj.elements["parentS"].options;
        /* 親ジャンルのoption数 */
        var pObjLen=pObj.length;
        var htm="<select name='childS' style='width:200px;'>";
        for(i=0; i<pObjLen; i++ ) {
            /* 親ジャンルの選択値を取得 */
            if(pObj[i].selected>0){
                var itemLen=item[i].length;
                for(j=0; j<itemLen; j++){
                    htm+="<option value='"+j+"'>"+item[i][j]+"<\/option>";
                }
            }
        }
        htm+="<\/select>";
        /* HTML出力 */
        document.getElementById(idName).innerHTML=htm;
    }

    /* 選択されている値をアラート表示 */
    function chkSelect(frmObj) {
        var s="";
        var idxP=frmObj.elements['parentS'].selectedIndex;
        var idxC=frmObj.elements['childS'].selectedIndex;
        if(idxP>0){
            s+="親ジャンルの選択肢："+frmObj.elements['parentS'][idxP].text+"\n";
            if(idxC > 0){
                s+="子ジャンルの選択肢："+frmObj.elements['childS'][idxC].text+"\n";
            }else{
                s+="子ジャンルが選択されていません\n";
            }
        }else{
            s+="親ジャンルが選択されていません\n";
        }
        alert(s);
    }

    /* onLoad時にプルダウンを初期化 */
    function init(){
        htm ="<select name='childS' style='width:200px;'>";
        htm+="<option value=''>"+item[0][0]+"<\/option>";
        htm+="<\/select>";
        /* HTML出力 */
        document.getElementById("childS").innerHTML=htm;
    }

    /* ページ読み込み完了時に、プルダウン初期化を実行 */
    window.onload=init;
</script>
				<?php
					$conn = pg_connect(getenv("DATABASE_URL"));
					if (!$conn) {
						exit('データベースに接続できませんでした。');
					}
					pg_set_client_encoding("UTF-8");

					$result = pg_query($conn, "SELECT a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id ORDER BY a.id ASC"); 
					

					//stringの配列情報
					while ($row = pg_fetch_row($result)) {
						$region_name_result = $row[0];
					 }
					 //string->array
					 $region_name_result = explode("," , substr($region_name_result, 1, strlen($region_name_result)-2));

					$arr = pg_fetch_all($result);

					echo "<table border=1><tr><th>日時</th><th>所属名</th><th>地域名</th><th>分類番号(番号)</th><th>分類番号(ひらがな)</th><th>車番号</th><th>罰金額</th><th>違反態様</th><th>支払い状況</th></tr>";
					//echo "<table border=1><tr><th>ID</th><th>userID</th><th>日時</th><th>車情報ID</th><th>刑罰ID</th><th>支払い状況</th><th>地方</th><th>地方（車）</th><th>分類ひらがな</th><th>分類番号</th><th>ナンバー</th></tr>";
					//データの出力
					foreach($arr as $rows){
						echo "<tr>\n";
						foreach($rows as $value){
							printf("<td>" .$value. "</td>\n");
						}
					}
					echo "</table>\n";

					pg_close($conn);
				?>
			</div>
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