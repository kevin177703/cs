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
<input type="submit" name="Submit" onclick="sendsms()" value="注册短信" />
<input type="submit" name="Submit" onclick="register()" value="注册" />
</body>
<script>
function register(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/website/register", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	 crossDomain: true,
		data: {
			loginName : "test1042",
			password : "1234qwer",
			realName : "李四",
			phone : "abcdered",
			vcode : "3786",
			type : "WEB"
		},
		success : function(data) { 
			alert(data.info);
		},
		error : function() {
			alert("error");
		}
	});
}
function sendsms(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/website/sendsms", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	 crossDomain: true,
		data: {
			phone : "13510001042",
			type : "register",
		},
		success : function(data) { 
			alert(data.info);
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
