<!DOCTYPE html>
<?php

	include("../conf/context-url.php");

	$mysqli = new mysqli('localhost', 'ubuntu', 'ubuntu', 'websec');
	if ($mysqli->connect_error) {
		echo $mysqli->connect_error;
		exit();
	} else {
		$mysqli->set_charset("utf8");
	}

	$sizetype = @$_GET['sizetype'];
	if($sizetype == ''){
		$sql = "SELECT id, name, image_url, issue_date, author, size_type, price FROM book_mst";
	}else{
		/** 不正な情報の取得 [SQLInjection脆弱性] **/
		// 以下のSQLをパラメータ"sizetype"に付加してページ表示すると、DBのバージョン情報が取得されてしまう
		// union select null, version(), null, null, null, null, null
		// 以下のSQLをパラメータ"sizetype"に付加してページ表示すると、ユーザーのカード情報が取得されてしまう
		// union select id, CONCAT(id, user_name, user_address), '', birthday, CONCAT(user_email,card_no), 0, 0 from card_mst
		$sql = "SELECT id, name, image_url, issue_date, author, size_type, price FROM book_mst WHERE size_type = $sizetype";
	}
	$result = $mysqli->query($sql);
?>

<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shopping Car</title>
		<!-- BootstrapのCSS読み込み -->
		<link href="<?php echo $contextRoot; ?>css/bootstrap/bootstrap.min.css" rel="stylesheet">
		<!-- 独自CSS読み込み -->
		<link href="<?php echo $contextRoot; ?>css/bootstrap/custom-default.css" rel="stylesheet">
		<!-- jQuery読み込み -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- BootstrapのJS読み込み -->
		<script src="<?php echo $contextRoot; ?>js/bootstrap/bootstrap.min.js"></script>
		<link href="./car.css" rel="stylesheet">
	</head>

	<body id="shopping">
		<div class="shopping-container">

			<div class="container-fluid">
				<form action="./complete-shopping.php" method="post">

					<?php
						$disptype = '';
						if($sizetype == '1'){
							$disptype = '　−　[大型本]';
						}else if($sizetype == '2'){
							$disptype = '　−　[単行本]';
						}
					?>

					<div class="row" style="padding:20px 20px 0px;">
						<blockquote class="block-message" style="margin:0px;border-left-color:#337ab7;">
						  <p>セキュリティ・ネットワーク関連のおすすめ書籍<?php echo $disptype; ?></p>
						</blockquote>
					</div>

					<?php
						$count = 0;
						echo '<div class="row" style="padding:20px 20px;">';
						while ($row = mysqli_fetch_assoc($result)) {
							if($count%3==0){
								echo '<div class="row" style="padding:20px 0px;">';
							}
							echo '<div class="col-sm-4">';
							if($row['image_url']!=''){
								echo '<img border="0" src="' . $contextRoot . 'image/book/' . $row['image_url'] .'" height="200" alt="NO IMAGE">';
							}else{
								echo '<img border="0" src="' . $contextRoot . 'image/noimage.png" height="160" alt="NO IMAGE">';
							}
							echo '<div class="form-group">';
							echo '<div>';
							echo '<a class="gn-icon gn-icon-article" href="#">' . $row['name'] . '</a>';
							echo '<label for="user-id" style="font-weight:100">' . $row['issue_date'] . '</label>';
							echo '</div>';
							echo '<div>';
							$sizetype = '大型本';
							if($row['size_type']=='2'){
								$sizetype = '単行本';
							}
							echo '<label for="user-id" style="font-weight:100">' . $row['author'] . ' / ' . $sizetype . '</label>';
							echo '</div>';
							echo '<div>';
							echo '<label for="user-id" style="font-weight:100">￥ ' . $row['price'] . '</label>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							if($count%3==2){
								echo '</div>';
							}
							$count++;
						}
						echo '</div>';
					?>

				</form>
			</div>

		</div>

	</body>
</html>
