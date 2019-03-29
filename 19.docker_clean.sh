#!/bin/bash
docker stop $(docker ps -a -q)
docker  rm $(docker ps -a -q) 
docker rm `docker ps -a |awk '{print $1}' | grep [0-9a-z]`
