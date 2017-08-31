<?php
//$file_handle = fopen("js/tmp.js", "r");
$file_handle = fopen("js/new_inside.js", "r");
while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if(strpos($line, 'imgToCanvas') !== false){
        echo 'function imgToCanvas(r = 0,g = 0,b = 0,a = 0,rIn = 0,gIn = 0,bIn = 0,aIn = 0, x = 0, y = 0){'.'<br>';
    }else if (strpos($line, 'rgba') !== false) {
        $tmp = explode(',', $line);
        $firstVal = substr($tmp[0], strpos($tmp[0], "(") + 1);
        $secondVal = $tmp[1];
        $thirdVal = $tmp[2];
        $fourthVal = current(explode(")", $tmp[3]));
//        $outerColor = 'cx.fillStyle="rgba("+('.$firstVal.' + r)+","+('.$secondVal.' + g)+","+('.$thirdVal.' + b)+","+('.$fourthVal.' + a)+")";';
//        echo $outerColor . '<br>';
        $innerColor = 'cx.fillStyle="rgba("+('.$firstVal.' + rIn)+","+('.$secondVal.' + gIn)+","+('.$thirdVal.' + bIn)+","+('.$fourthVal.' + aIn)+")";';
        echo $innerColor . '<br>';
    }else if (strpos($line, 'fillRect') !== false) {
        preg_match("/\(([^\)]*)\)/", $line, $matches);
        $retVal = explode(',', trim($matches[1]));
        $fillStyle = 'cx.fillRect(('.$retVal[0].' + x),('.$retVal[1].' + y),'.$retVal[2].','.$retVal[3].');';
        echo $fillStyle . '<br>';
    } else {
        echo $line . '<br>';
    }
}
?>