<?php
include_once 'curl.php';
$curl = new curl();
$url = "http://www.91333.com/api/caipiao/get_luzhu?id=xjssc";
#$url = "https://www.caipiaokong.com/chart/bjpks/1.html";
$data = $curl->get($url);

$contents= $data['data'];
//print_r($contents);
//echo "<br/>";
$contents = json_decode($contents,true);
//print_r($contents);
echo "<br/>";
$contents = $contents['rows'];

$data = array();
foreach ($contents as $v){
	$issues = $v['termNum'];
	$code = "";
	$i=1;
	for($i=1;$i<6;$i++){
		$code .= $v['n'.$i];
	}
	$data[$issues]=$code;
}
print_r($data);
exit();
/**
$pattern = '/<tr class="(odd)?">\s*<td>(\d{6})<\/td>\s*<td>(([01]\d,){9}[01]\d)<\/td>\s*<td>\d{4}-\d\d-\d\d \d\d:\d\d<\/td>\s*<\/tr>/Uims';
if (!preg_match($pattern, $contents, $match)){
	
}
preg_match_all($pattern, $contents, $matches);
*/
$pattern = '/<tr class="ball_row">\s*<td class=\'issue\'><div class="issueinfo">(\d{6})<\/div><\/td>\s*((<td align="center" class="codetd"><div class="historycode">(\d|10)<\/div><\/td>\s*){10})/Uims';
preg_match_all($pattern, $contents, $match);
//print_r($match);

$issues= $match[1];
$codes= $match[2];
foreach ($issues as $k=>$v){
	$tmpIssue = $v;
	$code = $codes[$k];
	$tmpPattern = '/<td align="center" class="codetd"><div class="historycode">(\d|10)<\/div><\/td>/Uims';
	preg_match_all($tmpPattern, $code, $tmpMatch);
	$tmpCode = "";
	foreach ($tmpMatch[1] as $v){
		if($v<10) $v="0".$v;
		$tmpCode .= $v." ";
	}
	$tmpCode = trim($tmpCode);
	echo "<br/>";
	echo $tmpIssue,"-",$tmpCode;
}
//print_r($data);
