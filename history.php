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
<input type="submit" name="Submit" onclick="betting()" value="投注记录" />
</body>
<script>
function betting(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/history/betting", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
			day : 30
		},
		success : function(data) { 
		},
		error : function(data) {
			alert("error");
		}
	});
}
</script>
</html>
