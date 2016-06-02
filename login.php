<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	$id       = @$_POST['id'];
	$password = @$_POST['password'];

	if(isset($_POST['login'])){

		if( $id != '' && $password != ''){
			echo "Start login-logic and get MySQL Connection.";
			$mysqli = new mysqli('localhost', 'root', 'password', 'websecdb');
			if ($mysqli->connect_error) {
				echo $mysqli->connect_error;
				exit();
			} else {
				$mysqli->set_charset("utf8");
			}

			echo "Success to getConnection! and Start to get LoginAccount Data";
			$sql = "SELECT id, password FROM user_accounts WHERE id = '$id' AND password = '$password' ";
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
			if (mysqli_num_rows($result) > 0) { // SELECTした行が存在する場合ログイン成功
				$_SESSION['id'] = $id;
				echo 'ログイン成功です';
				session_regenerate_id(true);
		  		header("Location: main.php");
		  		exit;
			} else {
				echo 'ログイン失敗です';
			}
			$result->close();

		}
	}

?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="main.css">
		<title>Web Application Security Study Login</title>
	</head>
	<body>
		<div class="login">
			<div class="heading">
				<h2>Web Application Security Study</h2>

				<form action="login.php" method="POST">

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

				<form action="register.php" method="POST">
					<ul>
						<li><a href="phpinfo.php">Register Your Account</a></li>
					</ul>
			 	</form>
			</div>
		</div>
	</body>
</html>
