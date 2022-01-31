<?php

use Recman\Http\Router\Router;
use Recman\Exceptions\PageNotFoundException;
use Recman\Exceptions\MethodNotAllowedException;

require __DIR__ . '/../vendor/autoload.php';

session_start();

try {
    Router::run();
} catch (PageNotFoundException | MethodNotAllowedException $exception) {
    die($exception->getMessage());
}