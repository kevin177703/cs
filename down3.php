<?php
header("Content-type: text/html; charset=gb2312");
include_once 'curl.php';
$curl = new curl();
$url = "http://zs.cailele.com/jx11x5/baseTrend.php";
$data = $curl->get($url);
//print_r($data);
$contents= $data['data'];
$pattern = '/<td>(20\d{8})  <\/td>\s*((<td class="yellow">[01]\d <\/td>\s*){5})/Uims';
preg_match_all($pattern, $contents, $matches);

$result= array();
foreach ($matches[1] as $k => $v){
	$tmpIssue = trim($v);
	$tmpIssue = substr($tmpIssue, 0, 8).'-'.substr($tmpIssue, 8, 2);
	if (!preg_match('`^201\d{5}-\d{2}$`',$tmpIssue)){
		echo  "奖期：{$tmpIssue}";
		exit();
	}
	$tmpPattern = '/<td class="yellow">([01]\d) <\/td>/Uims';
	$codes= trim($matches[2][$k]);
	preg_match_all($tmpPattern, $codes, $tmpMatch);
	$tmpNumber = "";
	foreach ($tmpMatch[1] as $v){
		$tmpNumber.= $v." ";
	}
	$tmpNumber= trim($tmpNumber);
	if (!preg_match('`^([01]\d\s){4}[01]\d$`Ui', $tmpNumber)){
		echo  "号码：{$tmpNumber}";
		exit();
	}
	$result[$tmpIssue] = array('issue' => $tmpIssue, 'number' =>$tmpNumber);
}
print_r($result);	