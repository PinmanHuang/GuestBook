<!DOCTYPE html>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="semantic.min.css">
		<script type="text/javascript" src="semantic.min.js"></script>
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="Style.css">
	</head>

	<body>
		<div class="full">
			<div id="title">
				<form>
					<label class="Guest">
						<a href="index.php">GuestBook</a>
					</label>
					<span>
						<a href="signup.php">
							<input type="button" class="in_up" id="up" value="Sign up">
						</a>
						
						<a href="signin.php">
							<input type="button" class="in_up" id="in" value="Sign in">
						</a>
					</span>
				</form>
			</div>

			<div class="sheet">
				<p id="head">Sign in</p>

				<form name="form" method="post" action="signin_connect.php">
					<div class="field">
						<label class="ui left icon input">
							<input type="text" placeholder="Username*" name="username">
							<i class="user icon"></i>
						</label>
						<br>
					</div>

					<div class="field">
						<label class="ui left icon input">
							<input type="password" placeholder="Password*" name="password">
							<i class="lock icon"></i>
						</label>
						<br>
					</div>

					<labels>
						<a href="signin_forget.php" class="forget_link">
							Forget your password?
						</a>
						<br>
						or creat account
					</label>
					<br>

					<input type="submit" id="input_but" name="button" value="Sign in">
				</form>
			</div>
		</div>
	</body>
</html>
