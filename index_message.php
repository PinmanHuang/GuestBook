<!DOCTYPE html>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			include("mysqli_connect.php");

			//資料從表單中取出 
			$title = $_POST['title'];
			$nickname = $_POST['nickname'];
			$message = $_POST['message'];

			$sql = "INSERT INTO all_message(title, nickname, content) VALUES('$title', '$nickname', '$message')";
			if (mysqli_query($link, $sql)) {
				header("Location: ".$_SERVER["HTTP_REFERER"]);
				echo $_SERVER["HTTP_REFERER"];
				echo "新增成功";
			}
			else{
				echo "新增失敗";
			}
		?>
	</body>
</html>