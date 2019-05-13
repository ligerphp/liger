<?php
require __DIR__.'./vendor/autoload.php';

  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(__FILE__));

  require_once(ROOT . DS . 'config' . DS . 'config.php');

  /*
|--------------------------------------------------------------------------
| Start Your Application
|--------------------------------------------------------------------------
|
*/

  $app = new Core\Foundation\Application(realpath(__DIR__));

  //api routes

  require __DIR__ . './routes/route.php';


  //other routes are for the web
  
  $app->start();
