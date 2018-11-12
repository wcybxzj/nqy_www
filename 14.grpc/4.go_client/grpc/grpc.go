package grpc

import (
	"google.golang.org/grpc"
	"zuji/common/dlog"
	"context"
	"fmt"
	"encoding/json"
	"errors"
	"nqy_www/14.grpc/2.go_common/apibeatlog"
)


var Service string
var Source string
var Host string
var abURI string

var rpcClient apibeatlog.ApiBeatClient


func InitGrpc(ApiBeatURI string, service string, host string) error {

	abURI = ApiBeatURI
	Service = service
	Host = host

	// 创建一个 gRPC channel 和服务器交互
	conn, err := grpc.Dial(ApiBeatURI, grpc.WithInsecure())
	if err != nil {
		return err
	}

	// 创建客户端
	rpcClient = apibeatlog.NewApiBeatClient(conn)

	return nil
}

func LogDataGrpc(source string, message string, data interface{}) (*apibeatlog.LogResponseData, error) {
	var log apibeatlog.LogRequestData


	if len(abURI) < 5 {
		dlog.DebugLog("ApiBeatLog", "ERR", "Need init", message, data)
		return nil, errors.New("Need init ")
	}

	if len(source) < 1 {
		source = Source
	}

	var dataStr string
	bs, err := json.Marshal(data)
	if err == nil {
		dataStr = string(bs)
	} else {
		dataStr = ""
	}

	dlog.DebugLog("ApiBeatLog", "LOG", message, dataStr)

	log.Service = Service
	log.Source = source
	log.Host = Host
	log.Data = dataStr
	log.Message = message

	resp, err := rpcClient.LogInfo(context.Background(), &log)
	if err != nil {
		return nil, err
	}

	if resp == nil {
		return nil, errors.New("Call error ")
	}

	return resp, nil
}

func LogDataWithHostGrpc(host string, source string, message string, data interface{}) (*apibeatlog.LogResponseData, error)  {
	var log apibeatlog.LogRequestData

	dlog.DebugLog("ApiBeatLog", "LOG", message, data)

	if len(abURI) < 5 {
		dlog.DebugLog("ApiBeatLog", "ERR", "Need init")
		return nil, errors.New("Need init ")
	}

	if len(source) < 1 {
		source = Source
	}

	var dataStr string
	bs, err := json.Marshal(data)
	if err == nil {
		dataStr = string(bs)
	} else {
		dataStr = ""
	}

	log.Service = Service
	log.Source = source
	log.Host = host
	log.Data = dataStr
	log.Message = message

	resp, err := rpcClient.LogInfo(context.Background(), &log)
	if err != nil {
		return nil, err
	}

	if resp == nil {
		return nil, errors.New("Call error ")
	}

	return resp, nil
}

func LogGrpc(a ...interface{}) {
	LogMessageGrpc(fmt.Sprintln(a...))
}

func LogSGrpc(source string, a ...interface{}) {
	LogMessageSGrpc(source, fmt.Sprintln(a...))
}

func LogMessageGrpc(message string) {
	LogDataGrpc("", message, nil)
}

func LogMessageSGrpc(source string, message string) {
	LogDataGrpc(source, message, nil)
}
