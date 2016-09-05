<?php

$url = "http://mbsdss.com/SecurityStudy/php/verify/xml-external-entity/xml-external-entity2.php";
$postdata = "<str><data1>xxx</data1><data2>yyy</data2></str>";


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
echo 'a';
$result = curl_exec($ch);
echo 'ab';
curl_close($ch);
echo $result;

/**
$url = "http://www.yahoo.co.jp/";
$ch = curl_init(); // はじめ

//オプション
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html =  curl_exec($ch);
var_dump($html);
curl_close($ch);
*/
?>
