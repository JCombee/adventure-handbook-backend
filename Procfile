web: vendor/bin/heroku-php-apache2 public/
worker: php artisan migrate --force --no-interaction
worker: php artisan data-aggregator:run
