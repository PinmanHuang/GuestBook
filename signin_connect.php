<?php
	include("mysqli_connect.php");
	include_once("functions.php");
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	//搜尋資料庫資料
	$sql = "SELECT * FROM all_member WHERE username = ?";
	//$sql = "SELECT * FROM all_member WHERE username = '$username'";
	$result = $link -> prepare($sql);
	$result -> bind_param("s", $username);
	$result -> execute();
	$getresult = $result -> get_result();
	//$result = mysqli_query($link, $sql);
	$row = $getresult -> fetch_assoc();
	//$row = mysqli_fetch_assoc($result);
	//判斷帳密，比對資料庫中是否有此會員
	if ($username !=null && $password != null && $row['username'] == $username && $row['password'] == $password) {
		//張帳號寫入session
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("Location: http://localhost/GuestBook/index.php");
		echo "登入成功";
	}
	else {
		if (isset($_SESSION['username'])) {
			destroySession();
		}
		header("Location: http://localhost/GuestBook/signin.php?status=1");
		echo "登入失敗"; ;
	}
?>