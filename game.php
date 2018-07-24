<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试</title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
</head>

<body>
<input type="submit" name="Submit" onclick="login()" value="登录" />
<input type="submit" name="Submit" onclick="logout()" value="退出" />
<input type="submit" name="Submit" onclick="gets()" value="游戏列表" />
</body>
<script>
function gets(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/game/gets", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
		},
		success : function(data) { 
		},
		error : function() {
			alert("error");
		}
	});
}
function login(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/website/login", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	 crossDomain: true,
		data: {
			loginName : "kevin100",
			password : "123456",
			type : "WEB",
			keepLogin : true,
		},
		success : function(data) { 
			alert(data.info);
		},
		error : function() {
			alert("error");
		}
	});
}
function logout(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/website/logout", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
		},
		success : function(data) {
			alert(data.info);
		},
		error : function() {
			alert("error");
		}
	});
}
</script>
</html>
