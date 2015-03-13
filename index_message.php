<!DOCTYPE html>
<?php
	include("mysqli_connect.php");
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			//資料從表單中取出 
			$title = htmlspecialchars($_POST['title']);
			$nickname = htmlspecialchars($_POST['nickname']);
			$message = htmlspecialchars($_POST['message']);

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