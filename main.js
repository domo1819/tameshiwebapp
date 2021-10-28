$(function(){
	//.sampleをクリックしてajax通信を行う
	$('.search_button').click(function(){
		var data = {request : $('#request').val()};
			$.ajax({
					url: 'index.php',
					type: 'POST',
					/* json形式で受け取るためdataTypeを変更 */
					data: data,
					//処理が成功したら
					success : function(data, dataType) {
						//HTMLファイル内の該当箇所にレスポンスデータを追加します。
						$('#res').html(data);
				},
				//処理がエラーであれば
				error : function() {
						alert('通信エラー');
				}
 });
 //submitによる画面リロードを防いでいます。
 return false;
});
});