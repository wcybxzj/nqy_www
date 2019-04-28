<?php
$f = 0.58;
var_dump(intval($f * 100));//57
var_dump(intval(bcmul($f , 100,2)));//58
var_dump(normalizer_normalize($f * 101));//58


if (empty(0)) {
	echo "0 is empty\n";
}else{
	echo "0 is not empty\n";
}

if (empty(0.00)) {
	echo "0.00 is empty\n";
}else{
	echo "0.00 is not empty\n";
}
?>

