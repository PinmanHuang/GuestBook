<?php
	session_start();
	//資料庫設定
	$db_server = "localhost";	//位置
	$db_user = "pinmanhuang";	//帳號
	$db_name = "db_guestbook";	//名稱
	$db_password = "database";	//密碼
	//連結資料庫
	$link = new mysqli($db_server, $db_user, $db_password, $db_name);
	if (!$link) {
		echo "資料庫連結錯誤代碼：". mysqli_connect_errno(). "<br>";
		echo "資料庫連結錯誤訊息：". mysqli_connect_error(). "<br>";
		exit();
	}
	else{
		//echo "MySQL資料庫連結成功". "<br>";
	}
	//session帳號登入紀錄
	$userstr = "(Guest)";
	if (isset($_SESSION['username'])) {
		$user = $_SESSION['username'];
		$loggedin = TRUE;
		$userstr = "($user)";
	}
	else{
		$loggedin = FALSE;
	}
	$link -> query("SET NAMES utf8");
?>