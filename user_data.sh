#!/bin/bash
# Enable the epel-release
sudo amazon-linux-extras install epel
# Install and start Apache web server
sudo yum install -y httpd php
# update permissions
sudo chmod 777 /var/www/html
# index.php to return page response with 200
sudo echo "Hello World" > /var/www/html/index.php
# Start the httpd service
sudo service httpd start
# Install CPU stress test tool
sudo yum install -y stress
