<?php
$f = 0.58;
var_dump(intval($f * 100));//57
var_dump(intval(bcmul($f , 100,2)));//58
var_dump(normalizer_normalize($f * 101));//58
?>

