package grpc

import (
	"context"
	"nqy_www/14.grpc/2.go_common/apibeatlog"
	"net"
	"google.golang.org/grpc"
	"zuji/apibeat/models"
	"encoding/json"
	"strconv"
	"fmt"
)

type ApiBeatRpcServer struct{}

func (s *ApiBeatRpcServer) LogInfo(ctx context.Context, in *apibeatlog.LogRequestData) (res *apibeatlog.LogResponseData, err error) {
	var data models.LogData

	if len(in.Message) > models.MAX_MESSAGE_SIZE {
		data.Message = string([]byte(in.Message)[:models.MAX_MESSAGE_SIZE])
	} else {
		data.Message = in.Message
	}

	data.Source = in.Source
	data.Host = in.Host
	data.Service = in.Service

	var f interface{}
	err = json.Unmarshal([]byte(in.Data), &f)
	if err != nil || f == nil {
		data.Data = nil
	} else {
		data.Data = f.(map[string]interface{})
	}
	fmt.Println(in)
	//go kafka.SendLog(config.Config.Topic, config.Config.Key, data)
	return &apibeatlog.LogResponseData {
		Code: strconv.Itoa(models.ERROR_OK),
		Msg:"ok",
	}, nil
}

func StartRpcServer(port string) error {
	lis, err := net.Listen("tcp", ":" + port)
	if err != nil {
		return err
	}

	rpcServer := grpc.NewServer()
	apibeatlog.RegisterApiBeatServer(rpcServer, &ApiBeatRpcServer{})
	err = rpcServer.Serve(lis)
	if err != nil {
		return err
	}

	return nil
}
