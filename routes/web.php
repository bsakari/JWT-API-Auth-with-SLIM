<?php

use App\Controllers\HomeController;
use App\Controllers\UsersController;

$app->get('/', HomeController::class . ':index');
$app->post('/api/login', UsersController::class . ':login');
$app->post('/api/users', UsersController::class . ':users');
