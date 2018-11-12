package main

import (
		"time"
		"nqy_www/14.grpc/4.go_client/apilog"
	"nqy_www/14.grpc/4.go_client/grpc"
	"fmt"
)

func main() {
	grpc.InitGrpc("127.0.0.1:1234","test_client","127.0.0.1")
	for i:=0;i<1000 ; i++ {
		m := map[string]int{
			"i":    i,
		}
		apilog.LogData("1111111","22222222", m)
		time.Sleep(time.Duration(time.Second))
		fmt.Println(i)
	}
}
