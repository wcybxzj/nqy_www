#!/bin/sh
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji.* from 'biz:zuji:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji_pay.* from 'pay:zuji_pay:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji_admin.* from 'admin:zuji_admin:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji_pay.* from 'admin:zuji_admin:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji_order.* from 'order:zuji_order:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji.* from 'order:zuji:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji_warehouse.* from 'order:zuji_warehouse:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji.* from 'risk:zuji:master'@'%';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "revoke delete on zuji_fengkong.* from 'risk:zuji:master'@'%';"



mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'biz:zuji:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'pay:zuji_pay:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'admin:zuji_admin:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'admin:zuji_admin:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'order:zuji_order:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'order:zuji:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'order:zuji_warehouse:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'risk:zuji:master';"
mysql -unqyong_release -pFM2rVp9x978Xxj6p -hrm-wz9vn1v4z6e94x0j9.mysql.rds.aliyuncs.com -e "show grants for 'risk:zuji:master';"
