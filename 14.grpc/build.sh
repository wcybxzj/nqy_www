#!/bin/bash
#php
protoc --php_out=./1.php_client_demo --grpc_out=./1.php_client_demo --plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin apibeat.proto

#golang
protoc --go_out=plugins=grpc:./2.go_common/apibeatlog apibeat.proto
