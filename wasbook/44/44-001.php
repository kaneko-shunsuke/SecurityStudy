<?php
  echo "Start!";
  session_start();
  header('Content-Type: text/html; charset=UTF-8');
  $author = $_GET['author'];
  //$con = pg_connect("host=localhost dbname=wasbook user=postgres password=wasbook");
  //$sql = "SELECT * FROM books WHERE author ='$author' ORDER BY id";
  //$rs = pg_query($con, $sql);  

	echo "getCon";
	$mysqli = new mysqli('localhost', 'root', 'password', 'mysql');
	if ($mysqli->connect_error) {
		echo $mysqli->connect_error;
		exit();
	} else {
		$mysqli->set_charset("utf8");
	}
	echo "getData";
	$sql = "SELECT id, name FROM books";
	if ($result = $mysqli->query($sql)) {
		// 連想配列を取得
		while ($row = $result->fetch_assoc()) {
		echo $row["id"] . $row["name"] . "<br>";
	}
	// 結果セットを閉じる
	$result->close();
}



?>
<html>
<body>
<table border=1>
<tr>
<th>蔵書ID</th>
<th>タイトル</th>
<th>著者名</th>
<th>出版社</th>
<th>出版年月</th>
<th>価格</th>
</tr>
<?php
  $maxrows = pg_num_rows($rs);
  for ($i = 0; $i < $maxrows; $i++) {
    $row = pg_fetch_row($rs, $i);
    echo "<tr>\n";
    for ($j = 0; $j < 6; $j++) {
      echo "<td>" . $row[$j] . "</td>\n";
    }
    echo "</tr>\n";
  }
  pg_close($con);
?>
</table>
</body>
</html>
