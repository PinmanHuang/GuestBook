function mouseover_changecolor() {
	this.style.backgroundColor="gray";
}
function checkId () {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} 
	else if (window.ActiveXObject) { 
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	} 
	else {
		return ; 
	}

	var postContent = "id=" + encodeURIComponent(this.document.form.username.value);
	
	xmlhttp.open("POST", "signup_checkid.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.send(postContent); 
	xmlhttp.onreadystatechange = function() {	
		if (xmlhttp.readyState == 4) {
		    if (xmlhttp.status == 200) {
				if(xmlhttp.responseText==1) {

			  		document.getElementById("showdata").innerHTML="<font color=red size=1%>*此帳號不可使用</font>";
				}
		    }
		}
	}
}