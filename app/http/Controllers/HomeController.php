<?php
  namespace App\Http\Controllers;

  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;
  use Core\View\View;

  class HomeController {

    
    public function index(Request $request,$name){
      return new Response($name);
    }
    
    public function indexAction(Request $request) {
      $view = new View();
      return new Response($view->render('home/index'));

    }
  }
