var request = require('request');

var options = {
  uri: 'http://127.0.0.1:40480/alert',
  method: 'POST',
  json: {"evalMatches":{ },"message":"{\"auth\":\"C8HB4*Ad$Eaj7ZT%S2mBbWyy%qd2G49A\",\"subject\":\"ssss\",\"bodyHtml\":\"html\", \"to\":[\"william@nqyong.com\"]}","ruleId":123,"ruleName":"test-name","ruleUrl":"www.baidu.com","state":"ok","title":"测试--测试"}
};

request(options, function (error, response, body) {
  if (!error && response.statusCode == 200) {
    console.log(body.id) // Print the shortened url.
    console.log(response) // Print the shortened url.
  }else{
    console.log(error)
    console.log("1111")
  }
});

