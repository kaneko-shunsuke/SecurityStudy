<?php
// 文字列を全て\uXXXX形式に変換する
function unicode_escape($matches) {
  $u16 = mb_convert_encoding($matches[0], 'UTF-16');
  return preg_replace('/[0-9a-f]{4}/' , '\u$0', bin2hex($u16));
}
// 英数字以外を\uXXXX形式でエスケープする
function escape_js_string($s) {
  return preg_replace_callback('/[^-\.0-9a-z]+/u', 'unicode_escape', $s);
}
?>
【呼び出し例】
<script>
  alert('<?php echo escape_js_string('??and吉'); ?>');
</script>

