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

	//echo "ようこそ" . $_SESSION["id"] . "さん";
?>



	<body>
	<div id="main-container">
		<div id="main-header">
			Web Application Security Study
		</div>
		<ul id="main-menu">
			<li><a href="./wasbook/index.html">MyPage</a></li>
			<li><a href="logout.php">Diary</a></li>
			<li><a href="logout.php">Option</a></li>		
			<li><a href="./wasbook/index.html">WasBook</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
<p><iframe src="./phpinfo.php" id="main-contents">代替内容</iframe></p>
	</div>
	</body>
</html>
