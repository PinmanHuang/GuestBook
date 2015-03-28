<?php
	include("mysqli_connect.php");
	//取回Layout.js存的id=DB中的username
	$username = $_POST['id'];
	$sql = "SELECT * FROM all_member WHERE username = ?";
	$result = $link -> prepare($sql);
	$result -> bind_param("s", $username);
	$result -> execute();
	$result -> store_result();
	$num = $result -> num_rows;
	//相同使用者名稱
	if ($num != NULL) {
		//回傳給Layout.js
		echo "1";
	}
?>