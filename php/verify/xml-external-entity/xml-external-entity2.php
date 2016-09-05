<?php
header('Content-Type: text/xml');

$doc = new DOMDocument();

//$reqest_dummy = '<!DOCTYPE str [<!ENTITY pass1 SYSTEM "/etc/hosts">]><str><data1>&pass1;</data1><data2></data2></str>';
$reqest_dummy = '<str><data1>aaa</data1><data2>bbb</data2><data3>&ccc;</data3></str>';

//$doc->loadXML(file_get_contents('php://input'));
//$doc->loadXML($reqest_dummy);
$movies = new SimpleXMLElement($reqest_dummy);

echo $movies;


//$data1 = $doc->getElementsByTagName('data1')->item(0)->textContent;
//$data2 = $doc->getElementsByTagName('data2')->item(0)->textContent;
//echo "<str>". htmlspecialchars($data1. $data2). "</str>";

?>
