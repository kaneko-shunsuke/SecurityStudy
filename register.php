<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
		<title>Web Application Security Study Register Your Account</title>
	</head>

<?php
	session_start();

	// ログイン状態のチェック
	//if (!isset($_SESSION["id"])) {
	//  header("Location: logout.php");
	//  exit;
	//}

	//echo "ようこそ" . $_SESSION["id"] . "さん";
?>

	<body>
	<div id="main-container">
		<div id="main-header">
			Web Application Security Study
		</div>

		<div class="input-group input-group-lg">
			<span class="input-group-addon">
				<i class="fa fa-user"></i>
			</span>
			<input type="text" name="id" class="form-control" placeholder="User-ID or email">
		</div>

		<div class="input-group input-group-lg">
			<span class="input-group-addon">
				<i class="fa fa-user"></i>
			</span>
			<input type="text" name="password" class="form-control" placeholder="Password">
		</div>



<!--<p><iframe src="./phpinfo.php" id="main-contents">代替内容</iframe></p>-->
	</div>
	</body>
</html>
