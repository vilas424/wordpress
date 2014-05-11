<?php

echo exec('wmic diskdrive get serialnumber |more >serial.txt');
//echo exec('wmic diskdrive get model,serialnumber | more >>file.txt');

?>
