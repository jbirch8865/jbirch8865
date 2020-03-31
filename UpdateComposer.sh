#!/bin/bash
cp /home/project2/vendor/jbirch8865/php_unit/config.local.ini /home/project2/storage/app/public/config.local.ini
composer update -d /home/project2/ -n
composer update -d /home/project2/vendor/jbirch8865/php_unit/ -n
cp /home/project2/storage/app/public/config.local.ini /home/project2/vendor/jbirch8865/php_unit/config.local.ini
/home/project2/vendor/jbirch8865/php_unit/vendor/bin/phpunit -c /home/project2/vendor/jbirch8865/php_unit/
