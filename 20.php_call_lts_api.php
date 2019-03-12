<?php
include "Curl.php";


	define('JOB_API',isset($_SERVER['JOB_API'])?$_SERVER['JOB_API']:'http://127.0.0.1:8082/javaserver/lts/jobs');
	define('JOB_AUTH',isset($_SERVER['JOB_AUTH'])?$_SERVER['JOB_AUTH']:'7ZT%SC8HB4*Ad$bWyEaj2mBy%qd2G49A');

    /**
     *
     * @param string $key   任务唯一标识
     * @param string $url   任务地址
     * @param array   $data 数据
     * @param string $type realTime：实时任务(任务添加后立即执行)；scheduled：定时任务；cron：cron格式计划任务
     * @param string $start
     * "@at 2018-04-02T02:55:30Z    按指定时间执行  只执行一次，Z代表0时区"
     * "@every 1h30m10s 按时间间隔循环执行  1小时30分10秒"
     * @param string $cron "cron 表达式格式"
     * @return bool
     */
    function push( string $key, string $url, array $data, string $callback='', string $type='realTime', string $start='',string $cron='' ):bool{
        $_config = [
            'interface' => 'jobAddAsync',
            'auth' => JOB_AUTH,
            'name' => $key,
            'desc' => '',
            'type' => $type,
            'url' => $url,
            'data' => $data,
            'callback' => $callback,
            'start' => $start,
            'cron' => $cron,
            'retries' => 3, // 错误重试次数
        ];
        // 请求
        $res = Curl::post(JOB_API, json_encode($_config), ['Content-Type: application/json']);
        if( !$res ){
			echo $res;
            return false;
        }
        $res = json_decode($res,true);
        if( !$res ){
			echo $res;
            return false;
        }
        if( $res['status']=='ok'){
			echo 'ok';
            return true;
        }
        return true;
    }

/*
"data": {
      "auth": "7ZT%SC8HB4*Ad%qd2G49A",
      "autoDelete": "false",
      "callback": "",
      "callbackHost": "",
      "cron": "",
      "data": "{\"back_url\":\"http://order.nqyong.com:1091/api/deduDepositNotify\",\"fundauth_no\":\"20B21966022612505\",\"out_trade_no\":\"YQB21967209565745\",\"reason\":\"成功\",\"sign\":\"00fb78bfb494e66bcc96b8c7a7ad557f\",\"sign_type\":\"MD5\",\"status\":\"success\",\"trade_no\":\"22B21967209614213\"}",
      "desc": "",
      "host": "",
      "interface": "jobAddAsync",
      "name": "pay-alipay-unfreezeandpay-22B21967209614213",
      "retries": "3",
      "start": "",
      "type": "realTime",
      "url": "http://order.nqyong.com:1091/api/deduDepositNotify"
    }
 */

push("name123", "http://127.0.0.1/job.php",array(), '','realTime','','') ;
