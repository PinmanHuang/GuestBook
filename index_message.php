<?php
	include("mysqli_connect.php");
	//資料從表單中取出，並處理XSS
	$title = htmlspecialchars($_POST['title']);
	$nickname = htmlspecialchars($_POST['nickname']);
	$message = htmlspecialchars($_POST['message']);
	if ($_SESSION['username'] != NULL) {
		$username = $_SESSION['username'];
	}
	
	//echo $id
	//取出all_member中id將每篇留言加上使用者rd_id
	$sql = "SELECT * FROM all_member WHERE username = ?";
	$result = $link -> prepare($sql);
	$result -> bind_param("s", $username);
	$result -> execute();
	$getresult = $result -> get_result();
	$row = $getresult -> fetch_assoc();
	$rf_meb_id = $row['id'];
	$sql = "INSERT INTO all_message(title, nickname, content, rf_id) VALUES(?,?,?,?)";
	$queryStatus = $link -> prepare($sql);
	$queryStatus -> bind_param("sssi",$title, $nickname, $message, $rf_meb_id);
	$queryStatus -> execute();
	if ($queryStatus) {
		//header("Location: ".$_SERVER["HTTP_REFERER"]);
		//echo $_SERVER["HTTP_REFERER"];
		//echo "新增成功";
		$insert_id = $queryStatus -> insert_id;
		$postReturn = array(	'id' => $insert_id,
								'title' => $title,
								'nickname' => $nickname,
								'message' => $message);
		echo json_encode($postReturn);
	}
	else {
		$postReturn = array(	'dataQualified' => $dataQualified);
		echo json_encode($postReturn);
	}
?>