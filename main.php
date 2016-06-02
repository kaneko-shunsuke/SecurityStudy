<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	// ログイン状態のチェック
	if (!isset($_SESSION["id"])) {
	  header("Location: logout.php");
	  exit;
	}

	echo "ようこそ" . $_SESSION["id"] . "さん";
?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="main.css">
		<title>Web Application Security Study Main</title>
	</head>
	<body>
		<ul>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="./wasbook/index.html">WasBook</a></li>
		</ul>
	</body>
</html>
