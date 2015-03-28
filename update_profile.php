<!DOCTYPE html>
<?php
	include("mysqli_connect.php");
	include("functions.php")
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			$username = $_SESSION['username'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			if ($username != null && $password != null && $password2 != null && $password == $password2) {				
				$sql = "UPDATE all_member SET password = ? WHERE username = ?";
				$queryStatus = $link -> prepare($sql);
				$queryStatus -> bind_param("ss", $password, $username);
				$queryStatus -> execute();
				if ($queryStatus) {
					destroySession();
					header("Location: http://localhost/GuestBook/signin.php");
					echo "修改成功";
				}
				else{
					echo "修改失敗";
				}
			}
		?>
	</body>
</html>