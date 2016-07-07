<?php
	$url = $_GET['url'];
	echo $url;
	if(!$url){
		$url = '../home.php';
	}
	header("Location: {$url}");

?>
