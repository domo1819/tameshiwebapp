$(function(){
	//.sampleをクリックしてajax通信を行う
	$('.sample_btn').click(function(){
			$.ajax({
					url: 'index.php',
					type: 'GET',
					/* json形式で受け取るためdataTypeを変更 */
					dataType: 'json',
					data : {
							gender : $('[name="region_name"]').val(),
					}
			}).done(function(data){
					/* 通信成功時 */
					var html_response = '<ul>';
					//json形式で受け取った配列を.each()で繰り返し、ul > liリストにする
					$.each(data, function(key, value){
							html_response += '<li>' + value + '</li>';
					});
					html_response += '</ul>';
					$('.result').html(html_response); //取得したHTMLを.resultに反映
					
			}).fail(function(data){
					/* 通信失敗時 */
					alert('通信失敗！');
									
			});
	});
});