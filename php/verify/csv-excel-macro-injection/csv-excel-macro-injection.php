<?php
	// CSV出力するデータを作成
	$data[0]['name'] = "CSV Excel Macro Injection";
	$data[0]['command'] = $_POST['macro-command'];

	//配列に入っているデータを1行の文字列にしてカンマ区切りのデータに変換
	for ( $i = 0 ; $i < count ( $data ) ; $i ++ ) {
		$csv_data.= $data[$i]['name'].','.$data[$i]['command']."\n";
	}

	//出力ファイル名の作成
	$csv_file = "csv_". date ( "Ymd" ) .'.csv';

	//文字化け対策のため文字コードを指定する
	$csv_data = mb_convert_encoding ( $csv_data , "sjis" , 'utf-8' );
              
	//MIMEタイプの設定
	header("Content-Type: application/octet-stream");
	//名前を付けて保存のダイアログボックスのファイル名の初期値
	header("Content-Disposition: attachment; filename={$csv_file}");
          
	// データの出力
	echo($csv_data);
	exit;
?>

