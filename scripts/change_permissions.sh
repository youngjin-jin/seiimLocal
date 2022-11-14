# mkdir temp
mkdir /home/bitnami/htdocs/temp

# set folders to 707
find /home/bitnami/htdocs/temp/ -type d -print0 | xargs -0 chmod 0707