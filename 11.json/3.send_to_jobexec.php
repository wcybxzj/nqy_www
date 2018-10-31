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
$url = "http://127.0.0.1:40480/alert";

echo $jsonStr = '{"evalMatches":{ },"message":"{\"auth\":\"C8HB4*Ad$Eaj7ZT%S2mBbWyy%qd2G49A\",\"subject\":\"ssss\",\"bodyHtml\":\"html\", \"to\":[\"william@nqyong.com\"]}","ruleId":123,"ruleName":"test-name","ruleUrl":"www.baidu.com","state":"ok","title":"测试--测试"}';

list($returnCode, $returnContent) = http_post_json($url, $jsonStr);

echo "==============\n";
echo $returnCode;
echo "==============\n";
echo  $returnContent;
