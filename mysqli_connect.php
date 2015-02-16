		<?php
			//資料庫設定
			$db_server = "localhost";	//位置
			$db_user = "pinmanhuang";	//帳號
			$db_name = "db_guestbook";	//名稱
			$db_password = "Idyllic_World1110";	//密碼
			$link = @mysqli_connect($db_server, $db_user, $db_password, $db_name);
			if (!$link) {
				echo "資料庫連結錯誤代碼：". mysqli_connect_errno(). "<br>";
				echo "資料庫連結錯誤訊息：". mysqli_connect_error(). "<br>";
				exit();
			}
			else{
				//echo "MySQL資料庫連結成功". "<br>";
			}
			mysqli_query($link, "SET NAMES utf8");
		?>