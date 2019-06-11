<?php

/**
 * Ligerphp - A PHP Framework For API Developers
 *
 * @package  Ligerphp
 * @author   Johnson Awah Alfred <fred@ligerphp.com>
 * 
 */

require __DIR__.'./../bootstrap/autoload.php';


/*
*---------------------------------------------------------------------------------
* Register Your Applications Root Directory You really dont need to touch this guy.
*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*
*/


$app = require_once __DIR__.'/../bootstrap/app.php';



  /**
   * ----------------------------
   * Queue routes for registration
   * +++++++++++++++++++++++++++++
   * 
   */

  $app->routes();

/**
 * ----------------------------------
 * ********** And Boom **********
 * ++++++++++++++++++++++++++++++++++
 * Liger PHP is ready Man! 
 * 
 */  
  $app->start();
