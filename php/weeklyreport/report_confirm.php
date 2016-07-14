<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
		<title>Web Application Security Study Register Your Account</title>

<script>

</script>

	</head>

<?php
	session_start();

	//POSTされたデータを変数に格納
	date_default_timezone_set('Asia/Tokyo');

	$submitdate = date("Y/m/d G:i:s");
	$fromdate = date("Y/m/d G:i:s");
	$todate = date("Y/m/d G:i:s");
	$lastweek = isset($_POST['txtarea-lastweek']) ? $_POST['txtarea-lastweek'] : NULL;
	$thisweek = isset($_POST['txtarea-thisweek']) ? $_POST['txtarea-thisweek'] : NULL;
	$memo = isset($_POST['txtarea-memo']) ? $_POST['txtarea-memo'] : NULL;

	echo $submitdate;
	echo $fromdate;
	echo $todate;
	echo $lastweek;
	echo $thisweek;
	echo $memo;

	echo "Start to save weekly_report to PostgreSQL";
	$pgSqlConn = "host=localhost dbname=websecdb user=websec password=websec";
	$pgSqllink = pg_connect($pgSqlConn);
	if (!$pgSqllink) {
		die('Fail to connect PostgreSQL'.pg_last_error());
	}
	print('Complete to connect PostgreSQL<br>');


	echo "Start to insert data";
	pg_set_client_encoding("UNICODE");
	$pgSqlQuery = "INSERT INTO weekly_report(userid,submit_date,from_date,to_date,contents) VALUES('kaneko_s', DATE '2016-07-07', DATE '2016-07-07',DATE '2016-07-07', '<report><title>Weekly Report 20160707</title><author>author_C</author><publisher>The new Project has been started</publisher></report>')";




	//$pgSqlQuery = "SELECT xpath('/report[author/text()=\"author_B\"]/title/text()', contents)  FROM weeklyreport";
	////$pgSqlResult = pg_query($pgSqllink, 'SELECT datname FROM pg_database');
	////$pgSqlResult = pg_query($pgSqllink, 'SELECT contents FROM weeklyreport');
	//$pgSqlResult = pg_query($pgSqllink, $pgSqlQuery);

	$result_flag = pg_query($pgSqlQuery);
	if (!$result_flag) {
		die('Fail to insert data'.pg_last_error());
	}
	echo "Complete to insert data";

	//if (!$pgSqlResult) {
	//	die('クエリーが失敗しました。'.pg_last_error());
	//}
	//echo pg_num_rows($pgSqlResult);
	//for ($i = 0 ; $i < pg_num_rows($pgSqlResult) ; $i++){
	//	$rows = pg_fetch_array($pgSqlResult, NULL, PGSQL_ASSOC);
	//	print('xpath='.$rows['xpath']);
	//}

	$close_flag = pg_close($pgSqllink);
	if ($close_flag){
		print('切断に成功しました。<br>');
	}


?>


	<body>
		送信完了しました
	</body>
</html>
