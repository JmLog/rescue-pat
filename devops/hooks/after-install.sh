#!/bin/bash
# Author Emad Zaamout | support@ahtcloud.com

# Runs inside production server.

# Project directory on server for your project.
export WEB_DIR="/var/www/html/rescue-pat"
# Your server user. Used to fix permission issue & install our project dependcies
export WEB_USER="ec2-user"

# Change directory to project.
cd $WEB_DIR

# change user owner to ubuntu & fix storage permission issues.
#sudo chown -R ec2-user:ec2-user .
#sudo chown -R www-data storage
#sudo chmod -R u+x .
#sudo chmod g+w -R storage
sudo chmod -R 775 storage
sudo chmod -R 775 storage/logs
sudo chmod -R 775 bootstrap/cache
sudo chmod +x artisan

# install composer dependcies
#sudo -u $WEB_USER composer install --no-dev --no-progress --prefer-dist
sudo composer install
sudo composer update
sudo composer dump-autoload
# load .env file from AWS Systems Manager
#./devops/scripts/generate-env.sh

# generate app key & run migrations
sudo -u $WEB_USER php artisan key:generate
sudo -u $WEB_USER php artisan migrate --force --no-interaction
