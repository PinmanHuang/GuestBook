<!DOCTYPE html>
<?php
	include("mysqli_connect.php");
	include_once("functions.php");
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			if (isset($_SESSION['username'])) {
				destroySession();
				echo "you have logged out.";
				header("Location: ".$_SERVER["HTTP_REFERER"]);
				echo $_SERVER["HTTP_REFERER"];
			}
		?>
	</body>
</html>