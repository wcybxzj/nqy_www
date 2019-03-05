#!/bin/bash

#打包 lts-core-1.7.0.jar 并且替换掉当前maven的jar
cd /root/www/light-task-scheduler-1.7.0
sh build.sh
cd /root/www/light-task-scheduler-1.7.0/dist
rm  -rf lts-1.7.0-bin
unzip lts-1.7.0-bin.zip
cp /root/www/light-task-scheduler-1.7.0/dist/lts-1.7.0-bin/lib/lts-core-1.7.0.jar /root/.m2/repository/com/github/ltsopensource/lts-core/1.7.0

echo "lts-core-1.7.0.jar ok"

#打包 lts-core-1.7.0-sources.jar 并且替换掉当前maven的jar
cd /root/www/light-task-scheduler-1.7.0
rm -rf  lts-core-1.7.0-sources.jar
zip -r  lts-core-1.7.0-sources.jar lts-core/*
cp /root/www/light-task-scheduler-1.7.0/lts-core-1.7.0-sources.jar /root/.m2/repository/com/github/ltsopensource/lts-core/1.7.0

echo "lts-core-1.7.0-sources.jar ok"

cd /root/.m2/repository/com/github/ltsopensource/lts-core/1.7.0
ls -l
