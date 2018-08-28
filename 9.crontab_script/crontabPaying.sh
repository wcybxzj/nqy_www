#!/bin/bash
screen -dmS crontabPay /bin/sh -c  "cd /data/docker/zuji && docker-compose exec phpfpm /bin/sh -c \"cd ../OrderServer/ && php artisan command:paying \""
