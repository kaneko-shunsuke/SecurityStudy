<!DOCTYPE html>
<?php

	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	header("X-XSS-Protection: 0");

	include("./conf/context-url.php");
	//$contextRoot = 'http://172.16.193.77/SecurityStudy/';

	// ログイン状態のチェック
	if (!isset($_SESSION["id"])) {
	  header("Location: ./logout.php");
	  exit;
	}

	// コンテンツ表示内容をセットする
	$contentId = @$_GET['contentId'];
	if($contentId=='phpinfo'){
		$contentUrl = "./util/phpinfo.php";
	}else if($contentId=='article'){
		$contentUrl = "./article/main.php";
	}else if($contentId=='wasbook'){
		$contentUrl = "../wasbook";
	}else if($contentId=='shopping_car'){
		$contentUrl = "./shopping/car.php";
	}else if($contentId=='shopping_book'){
		$sizetype = @$_GET['sizetype'];
		$contentUrl = "./shopping/book.php";
		if($sizetype != ''){
			$contentUrl = $contentUrl . '?sizetype=' . $sizetype;
		}
	}else if($contentId=='shopping_book_large'){
		$contentUrl = "./shopping/book.php?type=1";
	}else if($contentId=='shopping_book_middle'){
		$contentUrl = "./shopping/book.php?type=2";
	}else{
		$contentId = "mypage";
		$contentUrl = "./mypage/mypage.php";
	}

	// ログイン時のメール送信
	//include("./util/sendmail.php");

?>

<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>Web Application Security Study - Main</title>
		<meta name="description" content="A test site for web application security assessment by MBSD" />
		<meta name="author" content="MBSD" />

		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/component.css" />
		<script src="<?php echo $contextRoot; ?>js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">

			<!--　グローバルメニュー -->
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>

								<li>
									<a class="gn-icon gn-icon-archive">Shopping</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=shopping_car">Car</a></li>
										<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=shopping_book">Book</a></li>
<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=shopping_book&sizetype=1">大型本</a></li>
<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=shopping_book&sizetype=2">単行本</a></li>
									</ul>
								</li>

								<li>
									<a class="gn-icon gn-icon-download">Downloads</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
										<li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
										<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=wasbook">WAS-BOOK files</a></li>
									</ul>
								</li>
								<li>
									<a class="gn-icon gn-icon-cog">Settings</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=phpinfo">PHP Info</a></li>
									</ul>
								</li>
								<li><a class="gn-icon gn-icon-help">Help</a></li>
								<li>
									<a class="gn-icon gn-icon-archive">Archives</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article" href="./main.php?contentId=article">Articles</a></li>
										<li><a class="gn-icon gn-icon-pictures">Images</a></li>
										<li><a class="gn-icon gn-icon-videos">Videos</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="http://www.mbsd.jp/">MBSD WEBSITE</a></li>
				<li><a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/HeaderEffects/"><span>Previous Demo</span></a></li>
				<li><a class="codrops-icon codrops-icon-drop" href="./logout.php"><span>LOGOUT</span></a></li>
			</ul>
			<header class="header-short">
				<h1>Web Application Security Study 
					<span>
						A test site for web application security assessment by <a href="http://www.mbsd.jp/">MBSD</a>
					</span>
				</h1>	
			</header> 

			<!-- ページ改ざんの入り口 [XSS脆弱性] -->
			<script>
				document.write("<?php echo $_GET['keyword']; ?>");
			</script>

			<!-- メインコンテンツ -->
			<?php
				if($contentId!=""){
					echo '<iframe width="100%" height="800px" src="' .$contentUrl. '" id="main-contents"></iframe>';
				}
			?>
			<!--
			<iframe id="main-contents" width="100%" height="400px" 
					src="<?php echo htmlspecialchars($contentUrl, ENT_COMPAT, 'UTF-8') ?>" >
			</iframe>
			-->

		</div>

		<script src="<?php echo $contextRoot; ?>js/classie.js"></script>
		<script src="<?php echo $contextRoot; ?>js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>

	</body>
</html>
