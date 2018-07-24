<?php
include_once 'curl.php';
$curl = new curl();
$url = "http://kj.13322.com/ssc_cqssc_BaseTrend.html";
$data = $curl->get($url);

$contents= $data['data'];
//print_r($contents);
echo "<br/>";
$pattern = '/<td class="tdbbs tdbrs ">(20\d{9})<\/td>\s*<td class="tdbbs tdbrs kjfls "><span class="kjfc">(\d{5})<\/span><\/td>/Uims';
preg_match_all($pattern, $contents, $matches);
print_r($matches[1]);
echo "<br/>";
echo "<br/>";
print_r($matches[2]);
echo "<br/>";
echo "<br/>";
$reult = array();
foreach ($matches[1] as $k=>$v){
	$tmpIssue = trim($v);
	$tmpIssue = substr($tmpIssue,2,9);
	$tmpNumber = trim($matches[2][$k]);
	$reult[$tmpIssue] = $tmpNumber;
}
print_r($reult);
