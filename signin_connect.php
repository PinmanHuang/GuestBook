<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			include("mysqli_connect.php");
			$username = $_POST['username'];
			$password = $_POST['password'];

			//搜尋資料庫資料
			$sql = "SELECT * FROM all_member WHERE username = '$username'";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);

			//判斷帳密，比對資料庫中是否有此會員
			if ($username !=null && $password != null && $row['username'] == $username && $row['password'] == $password) {
				//張帳號寫入session
				$_SESSION['username'] = $username;
				header("Location: http://localhost/GuestBook/index.php");
				echo "登入成功";
			}
			else {
				echo "登入失敗";
			}
		?>
	</body>
</html>