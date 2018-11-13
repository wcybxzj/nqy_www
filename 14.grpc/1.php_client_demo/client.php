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

    //4.获取相应(可省略)
    //$message = $reply->getMessage();
    //return $message;
}

//模拟多次使用日志
try {
    for ($i=0;$i<10;$i++){
        echo "current i".$i."\n";
        echo LogInfo($i)."\n";
        sleep(1);
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


