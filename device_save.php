<?php
$file = fopen("serial.txt", "r");
while(!feof($file)){
    $line = fgets($file);
    # do same stuff with the $line
}
fclose($file);
?>