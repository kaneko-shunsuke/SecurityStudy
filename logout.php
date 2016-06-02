<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	if (isset($_SESSION["id"])) {
		$errorMessage = "ログアウトしました。";
	}else{
		$errorMessage = "セッションがタイムアウトしました。";
	}

	// セッション変数のクリア
	$_SESSION = array();

	// クッキーの破棄
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(
			session_name()
			, ''
			, time() - 42000
			, $params["path"]
			, $params["domain"]
			, $params["secure"]
			, $params["httponly"]
		);
	}

	// セッションクリア
	@session_destroy();
?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="main.css">
		<title>Web Application Security Study Logout</title>
	</head>
	<body>
		<div>
			<?php echo $errorMessage; ?></div>
			<ul>
				<li><a href="login.php">Return to LoginPage</a></li>
				<li><a href="phpinfo.php">PhpInfo</a></li>
			</ul>
	</body>
</html>
