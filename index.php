<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="semantic.min.css">
		<script type="text/javascript" src="semantic.min.js"></script>
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style_index.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<?php
			include("mysqli_connect.php");
			
			if ($_SESSION['username'] != null) {
		?>
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
					<div class="comment">
						<label>
							<input type="button" value="Comment" class="button_index">
						</label>
					</div>

					<p id="label_post">POSTs</p>

					<div class="comment">
						<?php
							$sql = "SELECT * FROM all_message";
							$result = mysqli_query($link, $sql);
							while($row = mysqli_fetch_assoc($result)){
						?>
						<fieldset>
							<legend>
								<?php 
									echo $row['title'];
								?>
							</legend>

							<div class="comment_but">
								<form>
									<input type="button" value="Editor" class="button_index">
									<input type="button" value="Delete" class="button_index">
									<input type="button" value="Reply" class="button_index">
								</form>
							</div>

							<div class="message">
								<ul>
									<li>
										<label>
											pic
										</label>
									</li>

									<li>
										<label>
											<?php
												echo $row['nickname'].  $row['time'];
											?>
										</label>
									</li>

									<li>
										<label>
										<?php
											echo $row['content'];
										?>
										</label>
									</li>

									<li>
										<label>Reply</label>
									</li>
								</ul>
							</div>
						</fieldset>
						<?php 
							}
						?>
					</div>

					<div class="ui form">
						<form class="field" method="post" action="index_message.php">
							<label>
								<input type="text" placeholder="Title..." name="title"><br>
							</label>

							<label>
								<input type="text" placeholder="Nickname..." name="nickname"><br>
							</label>

							<label>
								<textarea placeholder="leave a message..." name="message" required="required"></textarea>
							</label>

							<label>
								<input type="submit" value="Submit" class="button_index" name="button">			
							</label>
						</form>
					</div>
				</div>
			</div>
		<?php
			}
			else {
				echo "尚未登入無法觀看";
			}
		?>
	</body>
</html>