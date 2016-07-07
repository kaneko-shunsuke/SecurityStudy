<?php



echo 'メール送信処理 開始';
//言語設定、内部エンコーディングを指定する
mb_language("japanese");
mb_internal_encoding("EUC-JP");
 
//日本語メール送信
$to = "shunsuke.k.507@gmail.com";
$subject = "Subject Test";
$body = "Body Test";
$from = "test@example.com";
 
//ちゃんと日本語メールが送信できます
//mb_send_mail($to,$subject,$body,"From:".$from);
echo 'メール送信処理 完了';

?>
