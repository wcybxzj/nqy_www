#!/bin/bash
#protoc --php_out=./1.php_client_demo --grpc_out=./1.php_client_demo --plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin apibeat.proto
protoc --php_out=./2.go_server_demo --grpc_out=./2.go_server_demo --plugin=protoc-gen-grpc=/root/www/go_www/bin/protoc-gen-go  apibeat.proto
