if [ "$SECRET_KEY" = "" ]; then SECRET_KEY=`cat /dev/urandom | tr -dc A-Za-z0-9 | head -c 50`; echo "SECRET_KEY=$SECRET_KEY" >> ~/.bashrc; echo $SECRET_KEY; else echo $SECRET_KEY; fi
if [ "$BOOTSTRAP_TOKEN" = "" ]; then BOOTSTRAP_TOKEN=`cat /dev/urandom | tr -dc A-Za-z0-9 | head -c 16`; echo "BOOTSTRAP_TOKEN=$BOOTSTRAP_TOKEN" >> ~/.bashrc; echo $BOOTSTRAP_TOKEN; else echo $BOOTSTRAP_TOKEN; fi
mkdir -p /opt/jumpserver/media

cat ~/.bashrc
SECRET_KEY=3ONZm7dBA72dxhvYFLNQx3yankrWChMMOVZMvzmOnWVYdlwlS3
BOOTSTRAP_TOKEN=XLgDeD1pURihYOrS


create database jumpserver default charset 'utf8';
grant all on jumpserver.* to 'jumpserver'@'%' identified by 'weakPassword';
