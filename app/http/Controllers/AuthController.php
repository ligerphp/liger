<?php
namespace App\Http\Controllers;
use Core\Router;
use App\Models\Users;
use Core\Http\Request;
use Core\Http\Response;
use Core\View\View;
use App\Http\Controllers\Controller;


class AuthController  extends Controller{

  public function onConstruct(){
    $this->view->setLayout('default');
  }

  public function renderLogin(Request $request){
    $v = new View();
    return new Response($v->render('register/login'));

  }


  public function loginAction(Request $request) {


      /**
       * By default the helper method performs csrf check and validations
       */
      $user = app('auth')->attempt();
  if($user){
    // dd($_SESSION);
    return response()->withRedirect();
}

return response()->withRedirect('/auth/login');



    
}

  public function logoutAction() {
    return session()->clear_user();
  }

  public function registerAction() {
    $newUser = new Users();
    if($this->request->isPost()) {
      $this->request->csrfCheck();
      $newUser->assign($this->request->get(),Users::blackListedFormKeys);
      $newUser->confirm =$this->request->get('confirm');
      if($newUser->save()){
        Router::redirect('register/login');
      }
    }
    $this->view->newUser = $newUser;
    $this->view->displayErrors = $newUser->getErrorMessages();
    $this->view->render('register/register');
  }
}
