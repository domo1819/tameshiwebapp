<?php
					$conn = pg_connect(getenv("DATABASE_URL"));
					if (!$conn) {
						exit('データベースに接続できませんでした。');
					}
					

					$result = pg_query($conn, "SELECT a.id, a.timestamp, h.belong_name, c.region_name, b.car_classify_num, b.car_classify_hiragana, b.car_number, e.fine_amount, f.afk_mode, a.is_payment FROM warn_info a INNER JOIN car_data b ON a.car_data_id=b.id INNER JOIN region_data c ON b.car_region_id=c.id INNER JOIN punish_data d ON a.punish_id=d.id INNER JOIN fine_data e ON d.fine_id=e.id INNER JOIN afk_mode_data f ON d.afk_mode_id=f.id INNER JOIN user_data g ON a.user_id=g.user_id INNER JOIN belong_data h ON g.belong_id = h.id ORDER BY a.id ASC"); 

          $productList = array();
					//stringの配列情報
					while($row = pg_fetch_array($result)){
            $productList[] = array(
              'id'                    => $row['id'],
              'timestamp'             => $row['timestamp'],
              'belong_name'           => $row['belong_name'],
              'region_name'           => $row['region_name'],
              'car_classify_num'      => $row['car_classify_num'],
              'car_classify_hiragana' => $row['car_classify_hiragana'],
              'car_number'            => $row['car_number'],
              'afk_mode'              => $row['afk_mode'],
              'is_payment'            => $row['is_payment']
          );
          header('Content-type: application/json');
          // htmlへ渡す配列$productListをjsonに変換する
          echo json_encode($productList);
				?>