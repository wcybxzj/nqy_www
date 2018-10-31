<?php
$str = file_get_contents('php://input');
$arr = json_encode($str);
echo $arr;
echo "=========";
$arr = json_decode($str);
print_r($arr);

echo "=========";
echo $arr->auth;
