# shellcheck disable=SC2164
cd /var/www/html/resque-pat
sudo composer install
sudo composer update
sudo composer dump-autoload
