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
							<option value="ナンバープレート">ナンバープレート</option>
							<option value="違反対応">違反態様</option>
							<option value="日時">日時</option>
						</select><br><br>
						<label>検索単語を入力してください。(空欄の場合は全検索をします。)</label>
						<input type="text" id="search_text" name="Search_name" placeholder="検索語を入力してください">
						<br><br><br>
						<div class="engine">
							<input type="submit"  name="submit" value="検索" style="width:10%;padding:10px;font-size:20px; background-color:#00c4ff; color:#FFF; margin-bottom:10px;">
						</div>
					</div>
				</form>
				<?php
					$conn = pg_connect(getenv("DATABASE_URL"));
					if (!$conn) {
						exit('データベースに接続できませんでした。');
					}
					pg_set_client_encoding("UTF-8");

					

					$result = pg_query($conn,"select id,user_id, timestamp from warn_info WHERE  submit_name LIKE '%" . $_POST["Search_name"] . "%' "); 


					//stringの配列情報
					while ($row = pg_fetch_row($result)) {
						$region_name_result = $row[0];
					 }
					 //string->array
					 $region_name_result = explode("," , substr($region_name_result, 1, strlen($region_name_result)-2));

					$arr = pg_fetch_all($result);

					echo "<table border=1><tr><th>ID</th><th>user</th><th>日時</th><th>経度</th><th>緯度</th><th>car_id</th><th>写真</th></tr>";
					//データの出力
					foreach($arr as $rows){
						echo "<tr>\n";
						foreach($rows as $value){
							printf("<td>" .$rows[0]. "</td>\n");
							printf("<td>" .$rows[1]. "</td>\n");
							printf("<td>" .$rows[2]. "</td>\n");
							printf("<td>" .$rows[3]. "</td>\n");
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