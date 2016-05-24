<?php

require_once BASE_PATH.'/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Env
$dotenv = new Dotenv\Dotenv(BASE_PATH);
$dotenv->load();

// Logger
$logger = new Logger('');
$logger->pushHandler(new StreamHandler(BASE_PATH.'/logs/script.log', Logger::INFO));
