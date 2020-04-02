#!/bin/bash
cp /home/project2/vendor/jbirch8865/php_tools/config.local.ini /home/project2/storage/app/public/config.local.ini
composer update -d /home/project2/ -n
cp /home/project2/storage/app/public/config.local.ini /home/project2/vendor/jbirch8865/php_tools/config.local.ini
composer update -n -d /home/project2/vendor/jbirch8865/php_tools/
/home/project2/vendor/jbirch8865/php_tools/vendor/bin/phpunit -c /home/project2/vendor/jbirch8865/php_tools/