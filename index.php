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
		<link rel="stylesheet" type="text/css" href="./layout/style_index.css">
		<link rel="stylesheet" type="text/css" href="./layout/style.css">
	</head>

	<body>
		<div id="loggedin_msg">
			<?php
				//有無登入
				if ($loggedin) {
					echo "$user, you are logged in.";
				}
				else {
					echo "Please sign in or sign up to join us.";
				}
			?>
		</div>
		
		<div class="full">
			<div id="title">
				<form>
					<label class="Guest">
						<a href="index.php">GuestBook</a>
					</label>

					<span>
						<?php
							if (!$loggedin) {
						?>
						<a href="signin.php">
							<input type="button" class="in_up" id="in" value="Log in">
						</a>
						<?php
							}
							if (isset($_SESSION['username'])) {
						?>
						<a href="profile.php">
							<input type="button" class="in_up" id="in" value="Edit Profile">
						</a>
						<a href="logout.php">
							<input type="button" class="in_up" id="up" value="Log out">
						</a>
						<?php
							}
						?>
					</span>
				</form>
			</div>

			<div class="sheet">
				<div class="comment">
					<a href="#post" class="but_link">
						<label>
							<input type="button" value="Comment" class="button_index">
						</label>
					</a>						
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
								<a href="index_reply.php" class="but_link">
									<input type="button" value="Reply" class="button_index">
								</a>
							</form>
						</div>
							<div class="message">
							<ul>
								<!--li class="list">
									<label>
										pic
									</label>
								</li-->
									<li class="list" id="user_post">
									<label>
										<?php
											echo $row['nickname']." ". $row['time'];
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
				<a name="post">
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
				</a>
			</div>
		</div>
	</body>
</html>