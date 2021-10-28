
function getTableData() {
	//プルダウンで選択されたValueを取得
	var selectVal = $("#team_id").val();
	//getJSONで、別途用意している処理用PHPに必要な値を投げて受け取ります
	$.getJSON("index.php"
			, {"team_id": selectVal }			//team_idに取得したValue値を投げます
			, function (data, status) {			
				var playerList = $("#player_id");	//連動するプルダウンのID
				playerList.children().remove();	//子要素は毎回全て削除します(初期化)
				for (i in data) {
					var row = data[i];
					//取得したデータをAppendで1行ずつ追加
					playerList.append(new Option(row['player_name'], row['player_id']));
				}
			 }
	 );
}