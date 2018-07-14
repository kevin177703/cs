<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试 </title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
</head>

<body>
<input type="submit" name="Submit" onclick="test1()" value="提交1" />
<input type="submit" name="Submit" onclick="test2()" value="提交2" />
</body>
<script>
function test1(){
	$.ajax({
		url : "http://api.emclocal.com:8085/api/website/test1", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	 crossDomain: true,
		data: {
			code : "abc",
			id : "test12345"
		},
		success : function(data) { 
			alert(data);
		},
		error : function() {
			alert(11);
		}
	});
}
function test2(){
	$.ajax({
		url : "http://api.emclocal.com:8085/api/website/test2", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
			code : "abc"
		},
		success : function(data) {
			alert(data.id);
		},
		error : function() {
			alert(12);
		}
	});
}
</script>
</html>
