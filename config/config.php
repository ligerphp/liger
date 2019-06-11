<?php

  define('DEBUG', true); // set debug to false for production
  // this should be set to false for security reasons. If you need to run migrations from the browser you can set this to true, then run migrations, then set it back to false.
  define('RUN_MIGRATIONS_FROM_BROWSER', false);
  define('DEFAULT_CONTROLLER', 'Home'); // default controller if there isn't one defined in the url
  define('DEFAULT_LAYOUT', 'default'); // if no layout is set in the controller use this layout.
  define('PROOT', '/'); // set this to '/' for a live server.
  define('VERSION','0.30'); // release version this can be used to display version or version assets like css and js files useful for fighting cached browser files
  define('SITE_TITLE', 'Liger MVC Framework'); // This will be used if no site title is set
  define('MENU_BRAND', 'LIGER'); //This is the Brand text in the menu
  define('ACCESS_RESTRICTED', 'Restricted'); //controller name for the restricted redirect
  define('DS',DIRECTORY_SEPARATOR);
  define('ROOT',dirname(__FILE__).DS.'..'); // root part of the application
  