<?php
header("Content-type: text/html; charset=utf-8");
include_once 'curl.php';
$curl = new curl();
$url = "https://www.pkkai.com/pks/getPksHistoryList.do?lotCode=10001";
$data = $curl->get($url);
$contents= $data['data'];
$contents = json_decode($contents,true);
$data = $contents['result']['data'];
//print_r($data);
$matches= array();
foreach ($data as $k=>$v){
	$issue = $v['preDrawIssue'];
	$matches[$issue]=trim($v['preDrawCode']);
}
print_r($matches);
foreach ($matches as $k => $v){
	$tmpIssue = trim($k);
	if (!preg_match('`^\d{6}$`', $tmpIssue)){
		echo  "奖期：{$tmpIssue}";
		exit();
	}
	$tmpNumber = trim($v);
	$tmpNumber = str_replace(',',' ',$tmpNumber);
	if (!preg_match('`^([01]\d\s){9}[01]\d$`', $tmpNumber)){
		echo  "号码：{$tmpNumber}";
		exit();
	}
	$result[$tmpIssue] = array('issue' => $tmpIssue, 'number' =>$tmpNumber);
}
print_r($result);	