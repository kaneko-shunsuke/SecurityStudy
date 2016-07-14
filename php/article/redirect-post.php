<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title></title>
	</head>

	<?php
		session_start();

		$pstTxt  = @$_POST['txt-post-request'];
		$pstCode = @$_POST['sel-post-request'];
		echo 'txt-post-request:'.$pstTxt.'<br>';
		echo 'STATUS-CODE:'.$pstCode;

		if($pstCode=='−'){
			header("Location: ./goal.php");
		}else{
			header("Location: ./goal.php", true, $pstCode);
		}
		
	?>

	<body>
	</body>

</html>
