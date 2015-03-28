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
			$rfid = $_POST['id'];

			//資料插入資料庫
			$sql = "INSERT INTO reply_message(reply_content, reply_rfID) VALUES(?,?)";
			//$sql = "INSERT INTO reply_message(reply_content, reply_rfID) VALUES('$message', '$rfid')";
			$queryStatus = $link -> prepare($sql);
			$queryStatus -> bind_param("si",$message, $rfid);
			$queryStatus -> execute();
			if ($queryStatus) {
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