<?php
function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return array($httpCode, $response);
}

$url = "http://192.168.1.177/nqy_www/11.json/2.receive.php";
echo $jsonStr = json_encode( array("auth"=>"C8HB4*Ad\$Eaj7ZT%S2mBbWyy%qd2G49A", "To"=> array("william@nqyong.com"), "subject"=>"test", "bodyHtml"=>"test"));

#echo $jsonStr = '{ "auth":"C8HB4*Ad$Eaj7ZT%S2mBbWyy%qd2G49A", "To":["william@nqyong.com"], "subject":"test", "bodyHtml":"test" }';
list($returnCode, $returnContent) = http_post_json($url, $jsonStr);

echo "==============\n";
echo $returnCode;
echo "==============\n";
echo  $returnContent;
