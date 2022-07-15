<?php

define('ROOTPATH', __DIR__);
require ROOTPATH . '/vendor/autoload.php';

use App\Router;

$router = new Router(ROOTPATH . '/views');
$router
    ->get('/', 'home/index', 'home')
    ->run();
