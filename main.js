$(function(){
	function getAllData(){
    $.ajax({
        // 通信先ファイル名
        url: "index.php",
        // 通信が成功した時
        success: function(data) {
            // 取得したレコードをeachで順次取り出す
            $.each(data, function(key, value){
                // #all_show_result内にappendで追記していく
                $('#all_show_result').append("<tr><td>" + value.id + "</td><td>" + value.timestamp + "</td><td>"+ value.belong_name + "</td><td>" + value.region_name + "</td></tr>"+ value.car_classify_num + "</td></tr>"+ value.car_classify_hiragana + "</td></tr>"+ value.car_number + "</td></tr>"+ value.fine_amount + "</td></tr>"+ value.afk_mode + "</td></tr>"+ value.is_payment + "</td></tr>");
            });

            console.log("通信失敗");
            console.log(data);
        },

        // 通信が失敗した時
        error: function(){
            console.log("通信失敗");
            console.log(data);
        }
			});
		}
});