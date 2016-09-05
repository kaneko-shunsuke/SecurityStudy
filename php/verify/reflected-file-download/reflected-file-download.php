<?php
$user = $_GET['test'];
//$data = array('user_input'=>$user,'default_val1'=>'100','default_val2'=>'200');
header("Content-Type: application/json; charset=utf-8");
//echo json_encode($data);
echo '{aaa:bbb, ccc:' . $user . '}';
?>
