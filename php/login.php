<!DOCTYPE html>
<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	header("X-XSS-Protection: 0");

	include("./conf/context-url.php");

	$id       = @$_POST['id'];
	$password = @$_POST['password'];
	$isLogin  = 'false';

	if(isset($_POST['login'])){

		if( $id != '' && $password != ''){

			// ログイン認証処理
			//$mysqli = new mysqli('localhost', 'root', 'password', 'websecdb');
			$mysqli = new mysqli('localhost', 'ubuntu', 'ubuntu', 'websec');
			if ($mysqli->connect_error) {
				echo $mysqli->connect_error;
				exit();
			} else {
				$mysqli->set_charset("utf8");
			}

			/** ログイン認証の回避 [SQLInjection脆弱性1] **/
			echo "Success to getConnection! and Start to get LoginAccount Data";
			// NOT Use BIND-Structure
			$sql = "SELECT id, password FROM user_account WHERE id = '$id' AND password = '$password' ";
			// Use BIND-Structure 
			//$sql = "SELECT id, password FROM user_accounts WHERE id=? AND password=?"; 
			//if ($stmt = $mysqli->prepare($sql)) {
			//	$stmt->bind_param("is", $id, $password);
			//	$stmt->execute();
			//	$stmt->bind_result($id, $password);
			//	while ($stmt->fetch()) {
			//		echo "ID=$id, Password=$password <br>"; 
			//	}
			//	$stmt->close();
			//}
			$result = $mysqli->query($sql);
			// SELECTした行が存在する場合ログイン成功
			if (mysqli_num_rows($result) > 0) {
				// Login Success
				$_SESSION['id'] = $id;
				// ↓JSでリダイレクトさせるため、一時的にコメントアウト
				//session_regenerate_id(true);
		  		//header("Location: ./php/main.php");
		  		//exit;
				$isLogin = 'true';
			} else {
				// Login Fail
			}
			$result->close();
		}
	}

	

?>

<html lang="en" class="no-js">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>Web Application Security Study - Login</title>
		<meta name="description" content="A test site for web application security assessment by MBSD" />
		<meta name="author" content="MBSD" />

		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextRoot; ?>css/component.css" />

		<script src="<?php echo $contextRoot; ?>js/modernizr.custom.js"></script>
		<script type="text/javascript">
			/** Javascriptによるリダイレクト処理 [OpenRedirect脆弱性] **/
			var isLogin = <?php echo $isLogin; ?>;
			if(isLogin){
				// リダイレクト処理へ
				var redirectURL = location.search.substring(1);
				console.log("redirectURL:" + redirectURL);
				if(redirectURL!="" && redirectURL.indexOf("redirectURL=")==0){
					// URL末尾に「redirectURL=○○」が付加されている場合は、○○にリダイレクトする
					var url = redirectURL.substring(12);
					location.href = url;
				}else{
					// 通常のログイン（メインページヘ）
					location.href = "<?php echo $contextRoot; ?>php/main.php";
				}
			}
		</script>

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

			<!-- ログイン画面 -->
			<header class="header-large">
				<h1>Web Application Security Study 
					<span>A test site for web application security assessment by 
						<a href="http://www.mbsd.jp/">MBSD</a>
					</span>
				</h1>

				<div class="login">
					<div class="heading">

						<!-- ログインフォーム （リダイレクトURLをactionにセットします） -->
						<!--<form action="./login.php" method="POST">-->
						<?php echo '<form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">' ?>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-user"></i>
								</span>
								<input type="text" name="id" class="form-control" placeholder="User-ID or email">
							</div>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-lock"></i>
								</span>
						 		<input type="password" name="password"class="form-control" placeholder="Password">
							</div>
							<input type="hidden" id="login" values="login" name="login"></input>
							<button type="submit" id="login" name="login" value="login" class="float">Login</button>
					 	</form>

						<!-- アカウント登録画面へのリンク -->
						<a href="<?php echo $contextRoot; ?>php/register.php">Register Your Account</a>

					</div>
				</div>

			</header>
 
		</div>

		<!-- [パラメータ値の書出し XSS脆弱性1] -->
		<script>
			<?php 
				if(isset($_GET['mode'])){
					echo $_GET['mode'];
				}
			?>
		</script>

	</body>
</html>
