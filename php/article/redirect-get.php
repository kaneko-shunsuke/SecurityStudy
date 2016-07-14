<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title></title>
	</head>

	<?php
		session_start();

		$getTxt  = @$_GET['txt-get-request'];
		$getCode = @$_GET['sel-get-request'];
		echo 'txt-get-request:'.$getTxt.'<br>';
		echo 'STATUS-CODE:'.$getCode;

		if($getCode=='−'){
			header("Location: ./goal.php");
		}else{
			header("Location: ./goal.php", true, $getCode);
		}
		
	?>

	<body>
	</body>

</html>
