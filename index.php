<!DOCTYPE html>
<?php
	include("mysqli_connect.php");
?>
<html>
	<head lang="zn-TW">
		<meta charset="utf-8">
		<script type="text/javascript" src="./layout/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./layout/semantic.min.css">
		<script type="text/javascript" src="./layout/semantic.min.js"></script>
		<script type="text/javascript" src="./layout/Layout.js"></script>
		<link rel="stylesheet" type="text/css" href="./layout/style.css">
		<link rel="stylesheet" type="text/css" href="./layout/style_index.css">
	</head>
	<body>
		<div class="ui success message" id="hide_success_msg">
			<i class="close icon" id="delete_success_msg"></i>
			<div class="header">
				<?php
					//有無登入
					if ($loggedin) {
						echo "Hello $user, you are logged in.";
					}
					else {
						echo "Please sign in or sign up to join us.";
					}
				?>
			</div>
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
						<input type="button" class="ui button" value="Log in">
						</a>
						<?php
							}
							if (isset($_SESSION['username'])) {
						?>
						<a href="profile.php">
							<input type="button" class="ui button" value="Edit Profile">
						</a>
						<a href="logout.php">
							<input type="button" class="ui button" value="Log out">
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
				<!--完整留言 留言Input-->
				<div>
						<?php
							//取出留言內容
							$sql = "SELECT * FROM all_message";
							$result = $link -> query($sql);
							//$result = mysqli_query($link, $sql);
							$rows = $result -> fetch_all(MYSQLI_NUM);
							foreach($rows as $row){
								$msg_id = $row[0];
								$msg_rfid = $row[4];
								$title = $row[1];
								$nickname = $row[5];
								$time = $row[3];
								$content = $row[2];
						?>
						<!--一則完整留言-->
						<div class="ui blue segment">
							<!--編輯 刪除 回復 BUTTON
							<div>
								<form action="edit_delete_msg.php" method="get">
									<?php
										//留言內容與會員配對
										//if (isset($_SESSION['username'])) {
										//	$username = $_SESSION['username'];
										//	$sql_member = "SELECT * FROM all_member WHERE username = '$username'";
										//	$result_member = mysqli_query($link, $sql_member);
										//	$row_member = mysqli_fetch_assoc($result_member);
										//	$member_rfid = $row_member['id'];
										//	if ($msg_rfid == $member_rfid) {			
									?>
									<input type="hidden" value="">
									<input type="Submit" name="edit_msg" value="Editor" class="button_index">
									<input type="Submit" name="delete_msg" value="Delete" class="button_index">
									//<?php
									//	}
									//}
									?>
								</form>
							</div>
							-->
							<!--留言內容 回覆內容-->
							<div>
								<!--顯示留言內容-->
								<div class="msgContent">
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
								</div>
								<div class="ui list">
									<?php
										//取出回覆內容
										$sql_reply = "SELECT * FROM reply_message WHERE reply_rfID = ?";
										//$sql_reply = "SELECT * FROM reply_message WHERE reply_rfID ='$msg_id'";
										$result_reply = $link -> prepare($sql_reply);
										$result_reply -> bind_param("s", $msg_id);
										$result_reply -> execute();
										$result = $result_reply -> get_result();
										//$result_reply = mysqli_query($link, $sql_reply);
										while($row_reply = $result -> fetch_assoc()){
											//$row_reply = mysqli_fetch_assoc($result_reply)
											$content_reply = $row_reply['reply_content'];
											$rfid_reply = $row_reply['reply_rfID'];
									?>
									<!--顯示回覆內容-->
									<div class="item">
										<img class="ui avatar image" src="./images/cat.png">
										<div class="content">
											<div class="description">
												<label>
													<?php
													echo $content_reply;
													?>
												</label><br>
											</div>
										</div>
									</div>
									<?php
										}
									?>
								</div>
							</div>
							<!--回復 Input-->
							<div class="reply_field">
								<div class="ui form">
									<form class="field" method="post" action="index_reply_message.php">
										<label>
											<?php
												echo '<input type="hidden" name="id" value="'. $msg_id. '">';
											?>
										</label>
										<div>
											<label>
												<input placeholder="leave a reply message..." name="message" required="required">
												<input type="submit" value="Submit" class="ui button" id="replymsgSub" name="button">			
											</label>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php
					}
					if ($loggedin) {
					?>
					<a name="post" id="commentList"></a>
					<!--留言 Input-->
					<div class="ui form">
						<div class="msgInput">
							<!--form class="field" method="post" action="index_message.php"-->
							<label>
								<input type="text" placeholder="Title..." name="title" id="ms_title"><br>
							</label>
							<label>
								<input type="text" placeholder="Nickname..." name="nickname" id="nickname"><br>
							</label>
							<label>
								<textarea placeholder="leave a message..." name="message" id="message" required="required"></textarea>
							</label>
							<label>
								<input type="submit" value="Submit" class="button_index" name="button" id="message_but">			
							</label>
							<!--/form-->
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>