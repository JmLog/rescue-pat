# shellcheck disable=SC2164
cd /var/www/html/rescue-pat
sudo composer update
php artisan config:cache
php artisan route:clear
