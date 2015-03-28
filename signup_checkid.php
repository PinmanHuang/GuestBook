<?php
	include("mysqli_connect.php");
	//取回Layout.js存的id=DB中的username
	$username = $_POST['id'];
	$sql = "SELECT * FROM all_member WHERE username = ?";
	//$sql = "SELECT * FROM all_member WHERE username = '$username'";
	$result = $link -> prepare($sql);
	$result -> bind_param("s", $username);
	$result -> execute();
	$result -> store_result();
	//$result = mysqli_query($link, $sql);
	$num = $result -> num_rows;
	//$num = mysqli_num_rows($result);
	//相同使用者名稱
	if ($num != NULL) {
		//回傳給Layout.js
		echo "1";
	}
?>