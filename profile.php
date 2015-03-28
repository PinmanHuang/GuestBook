<!DOCTYPE html>
<?php
	include("mysqli_connect.php");
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./layout/semantic.min.css">
		<script type="text/javascript" src="./layout/semantic.min.js"></script>
		<script type="text/javascript" src="./layout/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./layout/Style.css">
	</head>

	<body>
		<div class="full">
			<div id="title">
				<form>
					<label class="Guest">
						<a href="index.php">GuestBook</a>
					</label>
				</form>
			</div>

			<div class="sheet_sign">
				<p id="head">Edit password</p>
				<?php
					if ($_SESSION['username'] != NULL) {
						$username = $_SESSION['username'];
						$sql = "SELECT * FROM all_member WHERE username = ?";
						$result = $link -> prepare($sql);
						$result -> bind_param("s", $username);
						$result -> execute();
						$getresult = $result -> get_result();
						$row = $getresult -> fetch_assoc();
				?>
				<form name="form" method="post" action="update_profile.php">
					<div class="required field">
						<div class="ui icon input">
							<input type="password" name="password" placeholder="New Password" pattern="[a-zA-Z0-9_]{1,20}" required="required">
							<i class="lock icon"></i>
						</div>
					</div>
							
					<div class="required field">
						<div class="ui icon input">
							<input type="password" name="password2" placeholder="Confirm Password">
							<br>
						</div>
					</div>
					<input type="submit" id="input_but" name="button" value="Submit">
					<input type="reset"s id="input_but" value="Reset">
				</form>
				<?php
					}
				?>
			</div>
		</div>
	</body>
</html>