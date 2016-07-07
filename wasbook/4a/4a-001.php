<?php
  define('TMPLDIR', '/var/www/html/SecurityStudy/wasbook/4a/tmpl/');
  $tmpl = $_GET['template'];
  echo $tmpl;
?>
<body>
<?php readfile(TMPLDIR . $tmpl . '.html'); ?>
メニュー（以下略）
</body>
