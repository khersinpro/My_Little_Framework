<?php

use Dotenv\Dotenv;

require __DIR__.'/../vendor/autoload.php';

$env_file = file_exists(__DIR__.'/../.env') ? 'env' : '.example.env';

$dotenv = Dotenv::createImmutable(__DIR__.'/..', $env_file);
$dotenv->load();

return [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PWD'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'],
];