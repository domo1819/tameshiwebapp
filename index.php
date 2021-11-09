<!doctype html>
<html lang="ja"><!--  htmlでここから記述する -->
	<head><!--  コンピューターが見る内容を記述 -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
		ログイン機能
		</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<?php
		 $err_msg = "";

		 if (isset($_POST['signup'])) {
			$username = $_POST['user_name'];
			$password = $_POST['password'];
		//③データが渡ってきた場合の処理
			try {
				$conn = pg_connect(getenv("DATABASE_URL"));
				$sql = pg_query($conn, "SELECT user_name, password FROM user_data WHERE user_name = '$username' AND password = '$password'");
				$result = pg_fetch_all($sql);
		//④ログイン認証ができたときの処理
				if ($result[0] != 0){
					header('Location: php/home.php');
		//⑤アカウント情報が間違っていたときの処理
				}else{
					$err_msg = "入力内容に誤りがあります。";
				}
		//⑥データが渡って来なかったときの処理
			}catch (PDOExeption $e) {
				echo $e->getMessage();
				exit;
			}
		}
		?>
	<body><!--  人間が見る内容を記述 -->
	 <div class="form-wrapper">
		 <h1>Login</h1>
	   <form action="" method="POST">
				<div class="form-item">
				<label for="signup-id">user_id</label>
					<div>
						<input name="user_name" id="signup-id" placeholder="IDを入力してください">
					</div>
				</div>
				<div class="form-item">
					<label for="signup-pass">password</label>
						<div>
							<input name="password" id="signup-pass" placeholder="passwordを入力してください">
						</div>
				</div>
				<div class="button-panel">
				<button name="signup" type="submit" class="button">Login</button>
				</div>
       </form>
			 <div class="form-footer">
       <p><?php echo $err_msg; ?></p>
       </div>
    </div>	
	</body>
</html>