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
			$message = htmlspecialchars($_POST['message']);

			$sql = "SELECT * FROM all_message WHERE ";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			$rf_rpl_id = $row['id'];
			echo $rf_rpl_id;

			//資料插入資料庫
			$sql = "INSERT INTO reply_message(reply_content) VALUES('$message')";
			if (mysqli_query($link, $sql)) {
				header("Location: http://localhost/GuestBook/index.php");
				echo $_SERVER["HTTP_REFERER"];
				echo "新增成功";
			}
			else{
				echo "新增失敗";
			}
		?>
	</body>
</html>