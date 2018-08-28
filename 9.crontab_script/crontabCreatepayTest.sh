#!/bin/sh
for((i=1;i<=100;i++));
do
	echo $i
	echo "\n"
	sleep 3
	/data/webroot/www/OrderServer/crontab_script/crontabCreatepay.sh
done
