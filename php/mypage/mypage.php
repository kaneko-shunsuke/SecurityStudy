<!DOCTYPE html>
<?php

include("../conf/context-url.php");

?>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Malicious Site</title>
		<!-- BootstrapのCSS読み込み -->
		<link href="<?php echo $contextRoot; ?>css/bootstrap/bootstrap.min.css" rel="stylesheet">
		<!-- 独自CSS読み込み -->
		<link href="<?php echo $contextRoot; ?>css/bootstrap/custom-default.css" rel="stylesheet">
		<!-- jQuery読み込み -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- BootstrapのJS読み込み -->
		<script src="<?php echo $contextRoot; ?>js/bootstrap/bootstrap.min.js"></script>
		<link href="./mypage.css" rel="stylesheet">
	</head>

	<body id="mypage">
		<div class="mypage-container">

			<div class="container-fluid">
				<div class="row" style="padding:20px 20px 0px;">
					<blockquote class="block-message" style="margin:0px;border-left-color:#337ab7;">
					  <p>MY PAGE</p>
					</blockquote>
				</div>
				<div class="row" style="padding:20px 0px;">
					<div class="col-sm-3" style="">
						<img border="0" src="<?php echo $contextRoot; ?>image/mypage/micky.jpg" height="200" alt="NO IMAGE">
					</div>
					<div class="col-sm-9" style="">
						  <div class="form-group">
							<label for="user-id">User ID</label>
							<input type="text" class="form-control" id="user-id" name="user-id" value="1234"　 readonly>
						  </div>
						  <div class="form-group">
							<label for="user-name">User Name</label>
							<input type="text" class="form-control" id="user-name" name="user-name" 
								placeholder="三井 太郎"　 readonly>
						  </div>
						  <div class="form-group">
							<label for="user-email">Email address</label>
							<input type="email" class="form-control" id="user-email" name="user-email" 
								placeholder="websec0000@ps.mbsd.jp"　 readonly>
						  </div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3" style="">
					</div>
					<div class="col-sm-9" style="">
						  <div class="form-group">
							<label for="message">Message</label>
							<!--<textarea class="form-control" id="message" name="message" rows="3" placeholder="Message"></textarea>-->
							<textarea class="form-control" id="message" name="message" rows="10"　 readonly>
三井太郎です。

都内のセキュリティ診断会社でセキュリティエンジニアとして働いています。

世の中のIT環境がより安全・安心になるとともに、
少しでも多くの人にセキュリティ技術に興味を持ってもらえれば幸いです。

よろしくお願いします！
							</textarea>
						  </div>
					</div>
				</div>

			</div>

		</div>

	</body>
</html>
