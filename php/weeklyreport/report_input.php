<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
		<title>Web Application Security Study Register Your Account</title>

<script>
  $(function() {
    $("#datepicker-from").datepicker();
$("#datepicker-from").datepicker("option", "showOn", 'button');
    $("#datepicker-from").datepicker("option", "buttonImageOnly", true);
    $("#datepicker-from").datepicker("option", "buttonImage", 'ico_calendar.png');

    $("#datepicker-to").datepicker();
$("#datepicker-to").datepicker("option", "showOn", 'button');
    $("#datepicker-to").datepicker("option", "buttonImageOnly", true);
    $("#datepicker-to").datepicker("option", "buttonImage", 'ico_calendar.png');
  });
</script>

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

<!--
<script src="jquery-1.4.4.min.js"></script>
-->
こんにちは<span id="name"></span>さん
<script type="text/javascript">
//window.alert(0);  
//if (document.URL.match(/name\=([^&]*)/)) {
if(document.URL.match(/name=([^&]*)/)){
  var name = unescape(RegExp.$1);
　　window.alert(name);  
$('#name').text(name);
}
</script>

	<body>
		<div id="main-container">

			<div class="nav">
				<ul class="nl">
					<li><a href="#">メニュー項目1</a></li>
					<li><a href="#">メニュー項目2</a></li>
					<li><a href="#">メニュー項目3</a></li>
					<li><a href="#">メニュー項目4</a></li>
					<li><a href="#">メニュー項目5</a></li>
				</ul>
			</div>

			<div>
<form action="./report_confirm.php" method="POST">
				報告開始日：
				<input type="text" id="datepicker-from">
				<br><br>

				報告終了日：
				<input type="text" id="datepicker-to">
				<br><br>

				<!--
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
				-->

				先週の業務報告：<br>
				<textarea name="txtarea-lastweek" rows="4" cols="40">先週の業務報告内容を記入してください</textarea>
				<br><br>

				今週の業務予定：<br>
				<textarea name="txtarea-thisweek" rows="4" cols="40">今週の業務予定を記入してください</textarea>
				<br><br>

				その他 報告事項：<br>
				<textarea name="txtarea-memo" rows="4" cols="40">その他の報告事項があれば記入してください。</textarea>
				<br><br>

				<input type="submit" value="提出"><input type="reset" value="リセット">

			</div>
</form>
		</div>
	</body>
</html>
