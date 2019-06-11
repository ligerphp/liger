<?php


$app->post('/api/auth/login','App\\Http\\Controllers\\AuthController::loginAction');
$app->post('/api/auth/register','App\\Http\\Controllers\\RegisterController::index');

$app->post('/api/auth/lg','App\\Api\\Controllers\\AuthController::jwtLogin');
$app->post('/api/auth/rg','App\\Api\\Controllers\\AuthController::register');
$app->post('/api/auth/','App\\Http\\Controllers\\TestController::post');
$app->post('/api/jwt','App\\Api\\Controllers\\JWTest::test');