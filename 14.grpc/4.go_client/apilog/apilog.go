package apilog

import (
	"nqy_www/14.grpc/4.go_client/grpc"
	)

//LogData log
func LogData(source string, message string, data interface{}) {
	grpc.LogDataGrpc(source, message, data)
}