<?php

//lastinsertid
//获取的只是这个链接最后的lastinsertid
$sleep = (isset($argv[1]))? $argv[1]:15;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO  test (id) VALUES (NULL)";
$re = mysqli_query($conn, $sql);


for ($i = $sleep; $i > 0; $i--) {
	sleep(1);
	echo "sleep 1\n";
}

if ($re) {
	$last_id = mysqli_insert_id($conn);
	echo "=========================\n";
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
