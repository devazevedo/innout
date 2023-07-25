<?php

    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    require_once(dirname(__FILE__, 2) . '/src/config/config.php');

    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    if($uri === '/innout/public/' || $uri === '' || $uri === '/innout/public/index.php') {
        $uri = '/login.php';
    }

    require_once(CONTROLLER_PATH . "/{$uri}");