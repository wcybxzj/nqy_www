<?php
define("GET_TOTALNUM_API", "https://dev-h5.nqyong.com");

define('MAX_PROCESS', 20);

function mylog($title, $msg) {
	$data  =  "\n".date("Y-m-d H:i:s")."\n";
	$data .= $title;
	$data .= $msg;
	echo "\n";
	file_put_contents("/tmp/crontabCreatepay.txt", $data, FILE_APPEND);
}

function get_totalnum() {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, GET_TOTALNUM_API);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output = curl_exec($ch);
	if($output === FALSE ){
		mylog("get_totalnum() CURL Error:", curl_error($ch));
		return 0;
	}
	curl_close($ch);
	mylog("get_totalnum()", intval($output));
	return intval($output);
}

function create_api2_args($totalnum){
	$arr=array();
	if ($totalnum <= 0) {//-1 ,0
		return $arr;
	}else if($totalnum >=1 && $totalnum <= MAX_PROCESS){//1-20
		for ($i = 1; $i < $totalnum+1 ; $i++) {
			$arr[$i-1]= array($i,$i);
		}
	}else{// > 20
		$init_arr = range(1, $totalnum);
		$size = ceil($totalnum/MAX_PROCESS);
		$arr = array_chunk($init_arr, $size);
		foreach ($arr as $k =>$arr2) {
			if (count($arr2) ==1) {
				$arr[$k][1] = $arr[$k][0];
			}elseif(count($arr2) > 2){
				$start = $arr2[0];
				$end = end($arr2);
				$arr[$k] = array($start, $end);
			}
		}
	}
	return $arr;
}

function cmd($screen_name, $start, $end) {
	mylog("cmd:","$start - $end");

	//system("cd /data/docker/zuji && nohup docker-compose exec -T phpfpm  /bin/sh -c \"cd ../OrderServer/ && nohup php test.php $start $end;\" 2>&1 &");

	//system("cd /data/docker/zuji && nohup docker-compose exec -T phpfpm  /bin/sh -c \"cd ../OrderServer/ && php artisan command:crontabCreatepay $start $end;\" 2>&1 &");

	system("screen -dmS $screen_name docker exec zuji_phpfpm_1 /bin/sh -c \"cd ../OrderServer/ && php test.php $start $end;\"");

}

//正式执行代码
function run(){
	$totalnum = get_totalnum();
	$args_arr = create_api2_args($totalnum);
	if (empty($args_arr)) {
		mylog("run()", "fail, args_arr is empty!");
		return;
	}
	foreach ($args_arr as $k => $arr) {
		if (count($arr)!=2) {
			return;
		}
		$start = $arr[0];
		$end = $arr[1];
		$screen_name = "job-$i"
		cmd($screen_name, $start, $end);
	}
}


//测试代码
function test() {
	create_api2_args(-1);
	create_api2_args(0);

	create_api2_args(1);
	create_api2_args(2);
	create_api2_args(3);

	for ($i = 3; $i <=20; $i++) {
		echo "$i:\n";
		create_api2_args($i);
		echo "\n";
	}

	for ($i = 21; $i <=50; $i++) {
		echo "$i:\n";
		create_api2_args($i);
		echo "\n";
	}

	for ($i = 51; $i <= 100; $i++) {
		create_api2_args($i);
	}

	for ($i = 101; $i <= 300; $i++) {
		create_api2_args($i);
	}

	create_api2_args(2000);
}

//test();
run();
