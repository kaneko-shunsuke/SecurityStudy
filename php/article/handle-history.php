<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title></title>
	</head>

	<?php
		session_start();

		//$redirectURL  = @$_GET['redirectURL'];	
	?>

	<body>
		<script>

			function setPushState(url){
				history.pushState(null, null, url);
			}

			function setReplaceState(url){
				history.replaceState(null, null, url);
			}

			//history.pushState('first', null, 'http://www.yahoo.co.jp');
			//history.pushState('first', null, './goal.php');
		</script>

		<input type="button" value="test.php" onClick="setPushState('./test.php')">

		<input type="button" value="yahoo.co.jp" onClick="setPushState('http://www.yahoo.co.jp')">

		<input type="button" value="javascript scheme" onClick="setPushState('../../../../../../../../../../javascript:alert(0)')">

		<input type="button" value="XSS request" onClick="setPushState('../login.php?redirectURL=javascript:alert(0)')">

		<br><br><br>

		<input type="button" value="pushState() history_1" onClick="setPushState('./history_1')">

		<input type="button" value="pushState() history_2" onClick="setPushState('./history_2')">

		<input type="button" value="replaceState() history_XXX" onClick="setReplaceState('./history_XXX')">

		<input type="button" value="pushState() history_3" onClick="setPushState('./history_3')">
			
	</body>

</html>
