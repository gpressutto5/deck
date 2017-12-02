<?php
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo 'You must set up the project dependencies using `composer install`' . PHP_EOL .
         'See https://getcomposer.org/download/ for instructions on installing Composer' . PHP_EOL;
    exit(1);
}

require_once __DIR__ . '/vendor/autoload.php';
