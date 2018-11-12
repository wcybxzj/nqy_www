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

function greet($i)
{
    $client = new Apibeatlog\ApiBeatClient('localhost:1234', [
        'credentials' => Grpc\ChannelCredentials::createInsecure(),
    ]);
    $request = new Apibeatlog\LogRequestData();
    $request->setSource("1111111111");
    $request->setMessage("22222");
    $request->setData(json_encode(array("i"=>$i)));
    $request->setService("apigateway");
    $request->setHost("127.0.0.1");
    list($reply, $status) = $client->LogInfo($request)->wait();
    $message = $reply->getMessage();
    return $message;
}

try {
    for ($i=0;$i<100;$i++){
        echo "current i".$i."\n";
        echo greet($i)."\n";
        sleep(1);
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


