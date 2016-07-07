<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
		<title>Web Application Security Study Main</title>
	</head>

<?php
	session_start();

	// ログイン状態のチェック
	if (!isset($_SESSION["id"])) {
	  header("Location: logout.php");
	  exit;
	}
	echo "ようこそ" . $_GET['id'] . "さん";

	$contentId = @$_GET['contentId'];
	$contentUrl = "./phpinfo.php";
	if($contentId==1){
		$contentUrl = "./phpinfo2.php";
	}else if($contentId==2){
		$contentUrl = "./weeklyreport/report_input.php";
	}

	echo "contentId=" . $contentId;
	echo "contentUrl=" . $contentUrl;

	include("./util/sendmail.php");

?>

	<body>
	<div id="main-container">
		<div id="main-header">
			Web Application Security Study
		</div>
		<script>
			document.write("<?php echo $_GET['keyword']; ?>");
		</script>
		<ul id="main-menu">
			<li><a href="./main.php?contentId=1" value="1" id="main-menu-1">MyPage</a></li>
			<li><a href="./main.php?contentId=2"  value="2">Weekly Report</a></li>
			<li><a href="logout.php">Option</a></li>		
			<li><a href="./wasbook/index.html">WasBook</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<p>
			<!--
			<iframe src="./phpinfo.php" id="main-contents">代替内容</iframe>
			-->
			<iframe src="<?php echo htmlspecialchars($contentUrl, ENT_COMPAT, 'UTF-8') ?>" 
					id="main-contents">代替内容</iframe>

		</p>
	</div>
	</body>
</html>
