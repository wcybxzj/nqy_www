#!/bin/sh

for (( i = 0; i < 10000; i++ )); do
	php php_memory_leak.php
done
