<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

if (file_exists(__DIR__ . '/wp-content/.env')) {
  $dotenv = new Dotenv();
  $dotenv->load(__DIR__ . '/wp-content/.env');
}
