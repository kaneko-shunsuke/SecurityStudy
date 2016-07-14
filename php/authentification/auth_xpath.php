<?php

	////////// XPath Login logic //////////

	// ここからXPath Injection のサンプル
	echo "Start to XPath";
	$dom = new DOMDocument('1.0', 'UTF-8');
	//$dom->preserveWhiteSpace = false;
	//$dom->formatOutput = true;
	//$dom->load("./xml-content/sample.xml");

	//$root       = $dom->getElementsByTagName("data")->item(0);
	//$sampleNode = $root->getElementsByTagName("sample")->item(0);
 
	//echo $sampleNode->nodeValue;


	$doc = new DOMDocument();
	$doc->load('./xml-content/account.xml');
	$xpath = new DOMXPath($doc);
	$name = $_GET['name'];
	//$name = "user1";
	$pass = $_GET['pass'];
	//$pass = "password1";
	//$pass = '=" or ""="';


	$result = $xpath->query('/account/user[name="'.$name.'" and password="'.$pass.'"]');

	//if ($result->length) { echo 'Hello '.$name; }
	//var_dump($result->length, $result->item(0)->nodeValue);
	foreach ($result as $n) {
	  //var_dump($n);
		echo $n->nodeValue;
	}

	echo "Start PostgreSQL";
$pgSqlConn = "host=localhost dbname=websecdb user=websec password=websec";
$pgSqllink = pg_connect($pgSqlConn);
if (!$pgSqllink) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');

//pg_set_client_encoding("sjis");
$pgSqlQuery = "SELECT xpath('/report[author/text()=\"author_B\"]/title/text()', contents)  FROM weeklyreport";
//$pgSqlQuery = "SELECT xpath('/report/title/text()', contents)  FROM weeklyreport";
//$pgSqlResult = pg_query($pgSqllink, 'SELECT datname FROM pg_database');
//$pgSqlResult = pg_query($pgSqllink, 'SELECT contents FROM weeklyreport');
$pgSqlResult = pg_query($pgSqllink, $pgSqlQuery);

if (!$pgSqlResult) {
    die('クエリーが失敗しました。'.pg_last_error());
}
echo pg_num_rows($pgSqlResult);
for ($i = 0 ; $i < pg_num_rows($pgSqlResult) ; $i++){
    $rows = pg_fetch_array($pgSqlResult, NULL, PGSQL_ASSOC);
    print('xpath='.$rows['xpath']);
}


$close_flag = pg_close($pgSqllink);

if ($close_flag){
    print('切断に成功しました。<br>');
}
	////////// XPath Login logic //////////

	$url = './redirect.php';
	header("Location: {$url}");
	exit;
?>
