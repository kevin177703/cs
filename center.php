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
<input type="submit" name="Submit" onclick="pay_list()" value="支付列表" />
<input type="submit" name="Submit" onclick="pay_get()" value="支付信息" />
<input type="submit" name="Submit" onclick="deposit_bank_list()" value="收款银行卡" />
<input type="submit" name="Submit" onclick="deposit_alipay_list()" value="收款支付宝" />
<input type="submit" name="Submit" onclick="withdraw_get()" value="获取用户取款信息" />
<input type="submit" name="Submit" onclick="daifubao()" value="代付宝支付" />
</body>
<script>
function daifubao(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/center/deposit/online", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
			webPayId : 3,
			cash : 100
		},
		success : function(data) { 
		},
		error : function(data) {
			alert("error");
		}
	});
}
function withdraw_get(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/center/withdraw/get", 
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
function deposit_alipay_list(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/center/deposit/alipay/list", 
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
function deposit_bank_list(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/center/deposit/bank/list", 
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
function pay_get(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/center/deposit/online/get", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
			webPayId : 3
		},
		success : function(data) { 
		},
		error : function() {
			alert("error");
		}
	});
}
function pay_list(){
	$.ajax({
		url : "http://local.emc188.cc:8085/api/center/deposit/list", 
		dataType : "json",
		xhrFields: {
            withCredentials: true
    	},
    	crossDomain: true,
		data: {
		},
		success : function(data) { 
		},
		error : function(data) {
			alert(data);
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
