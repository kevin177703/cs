<?php
header("Content-type: text/html; charset=utf-8");
include_once 'curl.php';
$curl = new curl();
$url = "https://api.api68.com/ElevenFive/queryElevnFiveTrendByIssue.do?issue=30&date=&lotCode=10015";
$data = $curl->get($url);
$contents= $data['data'];
$contents = json_decode($contents,true);
$data = $contents['result']['data'][0]['bodyList'];
$matches= array();
foreach ($data as $k=>$v){
	$issue = $v['issue'];
	$matches[$issue]=$v['code'];
}
foreach ($matches as $k => $v){
	$tmpIssue = trim($k);
	$tmpIssue = substr($tmpIssue, 0, 8).'-'.substr($tmpIssue, 8, 2);
	if (!preg_match('`^201\d{5}-\d{2}$`',$tmpIssue)){
		echo  "奖期：{$tmpIssue}";
		exit();
	}
	$tmpNumber = trim($v);
	$tmpNumber = str_replace(',',' ',$tmpNumber);
	if (!preg_match('`^([01]\d\s){4}[01]\d$`Ui', $tmpNumber)){
		echo  "号码：{$tmpNumber}";
		exit();
	}
	$result[$tmpIssue] = array('issue' => $tmpIssue, 'number' =>$tmpNumber);
}
print_r($result);	