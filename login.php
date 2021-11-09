<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ログイン機能</title>
  </head>

  <body>
  <h2>ログイン機能</h2>
	 <div class="sign-up">
	   <form action="" method="POST">
				<div>
				<label for="signup-id">アカウント名</label>
					<div>
						<input name="username" id="signup-id" placeholder="IDを入力してください">
					</div>
				</div>
				<div>
					<label for="signup-pass">パスワード</label>
						<div>
							<input name="password" id="signup-pass" placeholder="パスワードを入力してください">
						</div>
				</div>
				<div>
				<button name="signup" type="submit">Submit</button>
				</div>
       </form>
    </div>	
		<?php
		 $err_msg = "";

		 if (isset($_POST['login'])) {
			$username = $_POST['user_name'];
			$password = $_POST['password'];
		//③データが渡ってきた場合の処理
			try {
				$conn = pg_connect(getenv("DATABASE_URL"));
				$sql = pg_query($conn, "SELECT user_name, password FROM user_data where username=? and password=?");
				$result = pg_fetch_all($sql);
		//④ログイン認証ができたときの処理
				if ($result[0] != 0){
					header('Location: index.php');
				exit;
		//⑤アカウント情報が間違っていたときの処理
				}else{
					$err_msg = "アカウント情報が間違っています。";
				}
		//⑥データが渡って来なかったときの処理
			}catch (PDOExeption $e) {
				echo $e->getMessage();
				exit;
			}
		}
		?>
     </body>
</html>