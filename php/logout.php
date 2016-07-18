<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	//$contextRoot = 'http://172.16.193.77/SecurityStudy/';
	include("./conf/context-url.php");

	if (isset($_SESSION["id"])) {
		$errorMessage = "Logged out.";
	}else{
		$errorMessage = "Session was timed out.";
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
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>Web Application Security Study - Logout</title>
		<meta name="description" content="A test site for web application security assessment by MBSD" />
		<meta name="author" content="MBSD" />

		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/component.css" />
		<script src="<?php echo $contextRoot; ?>js/modernizr.custom.js"></script>
	</head>

	<body>
		<div class="container">

			<!-- グローバルメニュー -->
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
				</li>
				<li><a href="http://www.mbsd.jp/">MBSD WEBSITE</a></li>
				<li></li>
			</ul>

			<!-- ログインページに戻す -->
			<header class="header-large">
				<h1>
					<span>
						<?php echo $errorMessage; ?><br><br>
						<a href="./login.php">Return to Login Page</a>
					</span>
				</h1>
			</header>
 
		</div>

	</body>
</html>
