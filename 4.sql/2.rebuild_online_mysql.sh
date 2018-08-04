#!/bin/bash

mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "drop database zuji_pay;drop database zuji_order;drop database zuji_warehouse;"

mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "create database zuji_pay;alter database zuji_pay character set utf8;\
												create database zuji_order;alter database zuji_order character set utf8;\
												create database zuji_warehouse;alter database zuji_warehouse character set utf8;"

mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "use zuji_pay;source /home/naquyong/sql/zuji_pay20180725.sql;\
												use zuji_order;source /home/naquyong/sql/zuji_order20180725.sql;\
												use zuji_warehouse;source /home/naquyong/sql/zuji_warehouse20180725.sql;"


mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "use zuji_pay; show tables; \
												use zuji_order; show tables; \
												use zuji_warehouse;show tables;"



