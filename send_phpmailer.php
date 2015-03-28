<?php 
	include("mysqli_connect.php");
	require("../phpMailer/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // turn on SMTP authentication
	//這幾行是必須的

	$mail->Username = "pinmanhuang@gmail.com";
	$mail->Password = "";
	//這邊是你的gmail帳號和密碼

	$mail->FromName = "GuestBook Server";
	// 寄件者名稱(你自己要顯示的名稱)
	$webmaster_email = "hktfb20@gmail.com"; 
	//回覆信件至此信箱

	//取出輸入使用者名稱與信箱
	$send_email = $_POST['email'];
	$username = $_POST['username'];

	//搜尋資料庫資料
	$sql = "SELECT * FROM all_member WHERE username = '$username'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	
	//比對資料是否相同
	if ($row['username'] == $username && $row['email'] == $send_email) {
		$email = $send_email;
		// 收件者信箱
		$name = $username;
		// 收件者的名稱or暱稱
		$mail->From = $webmaster_email;


		$mail->AddAddress($email,$name);
		$mail->AddReplyTo($webmaster_email,"Squall.f");
		//這不用改

		$mail->WordWrap = 50;
		//每50行斷一次行

		//$mail->AddAttachment("/XXX.rar");
		// 附加檔案可以用這種語法(記得把上一行的//去掉)

		$mail->IsHTML(true); // send as HTML

		$mail->Subject = "GuestBook"; 
		// 信件標題
		$mail->Body = "Your password is :". $row['password'];
		//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
		$mail->AltBody = "Your password is :". $row['password']; 
		//信件內容(純文字版)
	}
	else {
		echo "用戶名稱或信箱輸入錯誤<br>";
	}

	if(!$mail->Send()){
	echo "寄信發生錯誤：" . $mail->ErrorInfo;
	//如果有錯誤會印出原因
	}
	else{ 
		header("Location: http://localhost/GuestBook/signin.php");
		echo $_SERVER["HTTP_REFERER"];
		echo "寄信成功";
	}

	//避免亂碼產生
	//mb_internal_encoding('UTF-8');	//將內部預設編碼改成utf-8
	/*
	$mail->Subject = "信件標題";
	$mail->Subject = iconv("big5","UTF-8","信件標題"); 
	*/
 ?>
