function mouseover_changecolor() {
	this.style.backgroundColor="gray";
}
function checkId () {
	var xmlhttp;
	//大部分瀏覽器包括IE7
	if (window.XMLHttpRequest) {
		//建立物件
		xmlhttp=new XMLHttpRequest();
	} 
	//IE5 6瀏覽器上XMLHttpRequest是個ActiveX物件
	else if (window.ActiveXObject) { 
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	} 
	else {
		return ; 
	}

	var postContent = "id=" + encodeURIComponent(this.document.form.username.value);
	//open開啟HTTP連線，取回signup_checkid.php值
	xmlhttp.open("POST", "signup_checkid.php", true);
	//指定HTTP請求表頭
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//指定送出HTTP請求
	xmlhttp.send(postContent); 
	//狀態改變時觸發事件處理(JS)
	xmlhttp.onreadystatechange = function() {
		//請求的狀態0=未初始化 1=正在載入 2=已在入 3=互動中 4=完成
		if (xmlhttp.readyState == 4) {
			//伺服器HTTP狀態碼 200=OK 404=Not Found
		    if (xmlhttp.status == 200) {
		    	//伺服器回應取回signup_checkid.php回傳值，判斷資料庫中有無相同使用者名稱
				if(xmlhttp.responseText==1) {
					//插入html
			  		document.getElementById("showdata").innerHTML="<font color=red size=2%>*此帳號不可使用</font>";
				}
		    }
		}
	}
}
$(document).ready(function() {
	$("#delete_success_msg").mousedown(function() {
		$("#hide_success_msg").hide();
	});
	$("#message_but").click(function(){
		var title = $("#ms_title").val();
		var nickname = $("#nickname").val();
		var message = $("#message").val();
		$.ajax({
			type: 'POST',
			url: 'index_message.php',
			data: {
				"title": title,
				"nickname": nickname,
				"message": message
			},
			dataType: 'json',
			success: function(msg){
				console.log(msg);
				//alert("成功");
				$("#commentList").before("<div class='ui blue segment'><div class='msgContent'><label id='msg_title'>"+title+"</label><br><label id='msg_name_time'>"+nickname+"</label><br><label id='msg_content'>"+message+"</label><br><label id='reply_title'>Reply</label><br></div></div>");
			},
			error: function(xhr, status, error){
				var err = eval("(" + xhr.responseText + ")");
  				alert(err.Message);
			}
		});
	});
});