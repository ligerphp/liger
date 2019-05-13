<?php

$app->get('/','App\\Http\\Controllers\\HomeController::indexAction');
$app->get('/auth/login','App\\Http\\Controllers\\AuthController::renderLogin');
$app->get('/auth/register','App\\Http\\Controllers\\RegisterController::render');
$app->post('/auth/register','App\\Http\\Controllers\\RegisterController::index');
