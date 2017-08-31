<?php
$tmp_string = 'cx.fillRect(279,239,1,1);';

preg_match("/\(([^\)]*)\)/", $tmp_string, $matches);
$retVal = explode(',', trim($matches[1]));
var_dump($retVal);

?>
