<?php
	include("mysqli_connect.php");
	//取回Layout.js存的id=DB中的username
	$username = $_POST['id'];

	$sql = "SELECT * FROM all_member WHERE username = '$username'";
	$result = mysqli_query($link, $sql);
	$num = mysqli_num_rows($result);
	//相同使用者名稱
	if ($num != null) {
		//回傳給Layout.js
		echo "1";
	}
?>