<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head lang="an-TW">
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			include("mysqli_connect.php");

			//資料從表單中取出
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password2 =  $_POST['password2'];
			$email = $_POST['email'];

			//選擇username欄位比對是否已存在相同名稱
			$sql_check = "SELECT * FROM all_member WHERE username = '$username'";
			$result_check = mysqli_query($link, $sql_check);
			$row_check = mysqli_fetch_assoc($result_check);

			//輸入形式是否正確
			if ($username != null && $password != null && $password2 != null && $password == $password2) {
				//檢查使用者名稱有無重複
				if ( $row_check['username'] == null) {
					//新增資料到資料庫
					$sql = "INSERT INTO all_member(username, password, email) VALUES ('$username', '$password', '$email')";
					if (mysqli_query($link, $sql)) {
						header("Location: http://localhost/GuestBook/signin.php");
						echo "新增成功";
					}
					else{
						echo "新增失敗";
					}
				}
				else {
					echo "名稱不可使用";
				}
			}
			else if($password != $password2) {
				echo "密碼兩次輸入不一致";
			}
		?>
	</body>
</html>