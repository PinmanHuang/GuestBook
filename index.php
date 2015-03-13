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
		<script type="text/javascript">
		$(document).ready(function() {
			$("#show").click(function() {
				alert("die");
				$(".reply_field").hidden();
			});
		});
		</script>
		<link rel="stylesheet" type="text/css" href="./layout/style.css">
		<link rel="stylesheet" type="text/css" href="./layout/style_index.css">
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

				<?php
					$sql = "SELECT * FROM all_message";
					$result = mysqli_query($link, $sql);									
					while($row = mysqli_fetch_assoc($result)){
						$msg_id = $row['id'];
						$title = $row['title'];
						$nickname = $row['nickname'];
						$time = $row['time'];
						$content = $row['content'];
				?>

				<div class="comment">
					
					<div class="comment_but">
					<form>
						<input type="button" value="Editor" class="button_index">
						<input type="button" value="Delete" class="button_index">
						<input type="button" value="Reply" class="button_index" id="show">
					</form>
				</div>

				<div class="message">
					<label id="msg_title">
						<?php 
							echo $title;
						?>
					</label><br>

					<label id="msg_name_time">
						<?php
							echo $nickname." ". $time;
						?>
					</label><br>

					<label id="msg_content">
						<?php
							echo $content;
						?>
					</label><br>
					<label id="reply_title">
						Reply	
					</label><br>

					<?php
						$sql_reply = "SELECT * FROM reply_message WHERE reply_rfID ='$msg_id'";
						$result_reply = mysqli_query($link, $sql_reply);
						while($row_reply = mysqli_fetch_assoc($result_reply)){
							$content_reply = $row_reply['reply_content'];
							$time_reply = $row_reply['reply_time'];
							$rfid_reply = $row_reply['reply_rfID'];
					?>

					<label class="msg_reply">
						<?php
							echo $time_reply;
						?>
					</label><br>
					<label class="msg_reply" id="reply_content">
						<?php
							echo $content_reply;
						?>
					</label><br>
					<?php
						}
					?>
				</div>

				<div class="ui form" id="reply_field">
					<form class="field" method="post" action="index_reply_message.php">
						<label>
							<?php
								echo '<input type="hidden" name="id" value="'. $msg_id. '">';
							?>
						</label>

						<label>
							<textarea placeholder="leave a reply message..." name="message" required="required"></textarea>
						</label>

						<label>
							<input type="submit" value="Submit" class="button_index" name="button">			
						</label>
					</form>
				</div>
				<?php
					}
				?>

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