<?php
	include("mysqli_connect.php");		
	//資料從表單中取出，避免XSS
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$password2 = htmlspecialchars($_POST['password2']);
	$email = htmlspecialchars($_POST['email']);
	//避免SQL Injection
	//選擇username欄位比對是否已存在相同名稱
	$sql_check = "SELECT * FROM all_member WHERE username = ?";
	$result_check = $link -> prepare($sql_check);
	$result_check -> bind_param("s", $username);
	$result_check -> execute();
	$result = $result_check -> get_result();
	$row_check = $result -> fetch_assoc();
	//輸入形式是否正確
	if ($username != null && $password != null && $password2 != null && $password == $password2) {
		//檢查使用者名稱有無重複
		if ( $row_check['username'] == null) {
			//新增資料到資料庫
			$sql = "INSERT INTO all_member(username, password, email) VALUES (?,?,?)";
			$query = $link -> prepare($sql);
			$query -> bind_param("sss",$username, $password, $email);
			$query -> execute();
			if ($query) {
				header("Location: http://localhost/GuestBook/signin.php");
				echo "新增成功";
			}
			else{
				echo "新增失敗";
			}
		}
		else {
			echo "名稱不可使用";
		}
	}
	else if($password != $password2) {
		echo "密碼兩次輸入不一致";
	}
?>