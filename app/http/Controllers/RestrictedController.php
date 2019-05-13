<?php
namespace App\Http\Controllers;

use Core\Controller;

class RestrictedController extends Controller {

  public function indexAction() {
    $this->view->render('restricted/index');
  }

  public function badTokenAction(){
    $this->view->render('restricted/badToken');
  }
}
