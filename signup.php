<!DOCTYPE html>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./layout/semantic.min.css">
		<script type="text/javascript" src="./layout/jquery-2.1.3.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#rfInput").click(function() {
				$("#showdata").empty();
			});
		});
		</script>
		<script type="text/javascript" src="./layout/semantic.min.js"></script>
		<script type="text/javascript" src="./layout/Layout.js"></script>
		<link rel="stylesheet" type="text/css" href="./layout/Style.css">
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
							<input type="button" class="ui button"value="Sign up">
						</a>
						<a href="signin.php">
							<input type="button" class="ui button" value="Sign in">
						</a>
					</span>
				</form>
			</div>

			<div class="sheet_sign">
				<p id="head">Sign up</p>

					<form name="form" method="post" action="signup_register.php">
						<div class="two fields" id="content">
							<div class="required field">
								<div class="ui icon input">
									<input type="text" name="username" id="rfInput" placeholder="Username" onblur="checkId()" pattern="[a-zA-Z0-9]{1,20}" required="required">
									<i  class="user icon"></i>									
								</div>
								<div id="showdata">
									
								</div>
							</div>

							<div class="required field">
								<div class="ui icon input">
									<input type="password" name="password" placeholder="Password" pattern="[a-zA-Z0-9_]{1,20}" required="required">
									<i class="lock icon"></i>
								</div>
							</div>
							
							<div class="required field">
								<div class="ui icon input">
									<input type="password" name="password2" placeholder="Confirm Password">
									<br>
								</div>
							</div>
						
							<div class="required field">
								<div class="ui icon input">
									<input type="email" name="email" placeholder="Email">
									<i class="mail outline icon"></i>
									<br>
								</div>
							</div>
						</div>

						<input type="submit" id="input_but" name="button" value="Register">
						<input type="reset"s id="input_but" value="Reset">
					</form>
			</div>
		</div>
	</body>
</html>

