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
			//資料從表單中取出，並處理XSS
			$title = htmlspecialchars($_POST['title']);
			$nickname = htmlspecialchars($_POST['nickname']);
			$message = htmlspecialchars($_POST['message']);
			$username = $_SESSION['username'];
			echo $id;

			//取出all_member中id將每篇留言加上使用者rd_id
			$sql = "SELECT * FROM all_member WHERE username = '$username'";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			$rf_meb_id = $row['id'];

			$sql = "INSERT INTO all_message(title, nickname, content, rf_id) VALUES('$title', '$nickname', '$message', '$rf_meb_id')";
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