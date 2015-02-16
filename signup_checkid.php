<?php
	include("mysqli_connect.php");

	$username = $_POST['id'];

	$sql = "SELECT * FROM all_member WHERE username = '$username'";
	$result = mysqli_query($link, $sql);
	$num = mysqli_num_rows($result);
	if ($num != null) {
		echo "1";
	}
?>