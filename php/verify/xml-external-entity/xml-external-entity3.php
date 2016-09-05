<?php
header('Content-Type: text/xml');

echo "<?xml version="1.0" ?>
<!DOCTYPE A [
	<!ENTITY Data1 SYSTEM 'http://mbsdss.com/SecurityStudy/php/verify/xml-external-entity/data1.xml'>
	<!ENTITY Data2 SYSTEM '/var/www/html/SecurityStudy/php/verify/xml-external-entity/data2.xml'>
]>
<A>&Data1;&Data2;</A>";
?>
