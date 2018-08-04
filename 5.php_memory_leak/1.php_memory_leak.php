<?php
ini_set('memory_limit', '128M');
$string = str_pad('1', 128 * 1024 * 1024);
echo"因为 Allowed memory size of xxxxxx bytes exhausted, 不会执行这条语句";
