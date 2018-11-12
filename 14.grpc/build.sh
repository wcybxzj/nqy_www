#!/bin/bash
#protoc --php_out=./1.php_client_demo --grpc_out=./1.php_client_demo --plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin apibeat.proto


#创建go 客户端/服务端 代码
protoc --go_out=plugins=grpc:./2.go_common/apibeatlog apibeat.proto
