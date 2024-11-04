#!/bin/bash
sudo systemctl start httpd
sudo systemctl enable httpd
sudo chmod -R 755 /var/www/html/
sudo chown -R apache:apache /var/www/html/
sudo chmod -R 1777 /tmp

# Retrieve secrets from Secrets Manager
AWS_REGION="us-east-1"
SECRET=$(aws secretsmanager get-secret-value --secret-id "ecommerce/rds/credentials2" --query SecretString --output text --region $AWS_REGION)
RDS_HOST=$(echo $SECRET | jq -r .RDS_HOST)
RDS_USER=$(echo $SECRET | jq -r .RDS_USER)
RDS_PASSWORD=$(echo $SECRET | jq -r .RDS_PASSWORD)
RDS_DBNAME=$(echo $SECRET | jq -r .RDS_DBNAME)

# Update PHP connection details
sudo sed -i "s/\$servername =.*/\$servername = '${RDS_HOST}';/" /var/www/html/includes/connect.php
sudo sed -i "s/\$username =.*/\$username = '${RDS_USER}';/" /var/www/html/includes/connect.php
sudo sed -i "s/\$password =.*/\$password = '${RDS_PASSWORD}';/" /var/www/html/includes/connect.php
sudo sed -i "s/\$dbname =.*/\$dbname = '${RDS_DBNAME}';/" /var/www/html/includes/connect.php

sudo systemctl restart httpd

