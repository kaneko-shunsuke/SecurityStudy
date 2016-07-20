<!DOCTYPE html>
<?php

include("../conf/context-url.php");

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


				<div class="row" style="padding:20px 20px 0px;">
					<blockquote class="block-message" style="margin:0px;border-left-color:#337ab7;">
					  <p>Lexus LC</p>
					</blockquote>
				</div>
				<div class="row" style="padding:20px 0px;">
					<div class="col-sm-6" style="">
						<img border="0" src="<?php echo $contextRoot; ?>image/LC.jpg" height="200" alt="NO IMAGE">
					</div>
					<div class="col-sm-6" style="">
						  <div class="form-group">
							<label for="user-id">価格</label>
							<input type="text" class="form-control" id="car-price" name="car-price" value="￥10,000,000円"　 readonly>
						  </div>
						<button type="submit" class="btn btn-primary">1-Clickで今すぐ買う</button>
					</div>
				</div>
			</form>
			</div>

		</div>

	</body>
</html>
