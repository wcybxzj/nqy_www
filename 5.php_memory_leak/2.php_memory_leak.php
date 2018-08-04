<?php
ini_set("memory_limit",'1M');

$string = str_pad('1', 1* 750 *1024);
$string2 = $string;
$string2 .= '1';

