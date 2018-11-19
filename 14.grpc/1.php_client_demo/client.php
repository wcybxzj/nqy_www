<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 18-11-12
 * Time: 下午2:57
 */
require dirname(__FILE__).'/vendor/autoload.php';

include_once dirname(__FILE__).'/Apibeatlog/ApiBeatClient.php';
include_once dirname(__FILE__).'/Apibeatlog/LogRequestData.php';
include_once dirname(__FILE__).'/Apibeatlog/LogResponseData.php';
include_once dirname(__FILE__).'/GPBMetadata/Apibeat.php';

function LogInfo($i)
{
    //1.创建client
    $client = new Apibeatlog\ApiBeatClient('localhost:1234', [
        'credentials' => Grpc\ChannelCredentials::createInsecure(),
    ]);

    //2.创建request
    $request = new Apibeatlog\LogRequestData();
    $request->setSource("1111111111");
    $request->setMessage("22222");
    $request->setData(json_encode(array("i"=>$i)));
    $request->setService("apigateway");
    $request->setHost("127.0.0.1");


    //3.发起请求
    list($reply, $status) = $client->LogInfo($request)->wait();

    //4.获取相应
    if ($status->code == 0) {
        $code = $reply->getCode();
        $msg = $reply->getMsg();
        //TODO
    } else {
        $code = -1;
        $msg = 'grpc request failed';
    }
    echo "code:".$code."<br>";
    echo "msg:".$msg."<br>";
    //set_time_limit(0);
}

try {
    echo LogInfo(1)."<br>";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "<br>";
}

echo "永远能看到下面的业务1";

try {
    echo LogInfo(2)."<br>";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "<br>";
}

echo "永远能看到下面的业务2";
