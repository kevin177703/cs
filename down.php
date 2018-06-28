<?php
include_once 'curl.php';
$curl = new curl();
$url = "http://kj.13322.com/ssc_xjssc_history_dtoday.html";
$data = $curl->get($url);

$contents= $data['data'];
//print_r($contents);
echo "<br/>";
$pattern = '/<td class="tdbbs tdbrs">(\d{10})<\/td>\s*<td class="tdbb tdbrs" align="center">\s*<table width="200" border="0" cellpadding="0" '
		.'cellspacing="0" class="subtab">\s*<tr>\s*((<td width="40" class="Ballsc_blue">\d<\/td>\s*){5})\s*<\/tr>\s*<\/table>\s*<\/td>/Uims';
preg_match_all($pattern, $contents, $matches);
//print_r($match[1]);
echo "<br/>";
echo "<br/>";
//print_r($match[2]);
$reult = array();
$pattern = '/<td width="40" class="Ballsc_blue">(\d)<\/td>/Uims';
foreach ($matches[1] as $k=>$v){
	$tmpIssue = trim($v);
	$tmpIssue = substr($tmpIssue,2,8);
	$tmpNumber = trim($matches[2][$k]);
	preg_match_all($pattern, $tmpNumber, $tmpMatch);
	$tmpNumber = "";
	foreach ($tmpMatch[1] as $vv){
		$tmpNumber .= $vv;
	}
	$reult[$tmpIssue] = $tmpNumber;
}
print_r($reult);
