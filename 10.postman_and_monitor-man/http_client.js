var request = require('request');

var options = {
  uri: 'http://172.18.124.156:40480/alert',
  method: 'POST',
  json: { 
		"auth":"C8HB4*Ad$Eaj7ZT%S2mBbWyy%qd2G49A",
		"To":["william@nqyong.com"],
		"subject":"test",
		"bodyHtml":"test"
	  }
};

request(options, function (error, response, body) {
  if (!error && response.statusCode == 200) {
      console.log(response.body) // Print the shortened url.
    }else{
	  console.log(error)
	}
});
