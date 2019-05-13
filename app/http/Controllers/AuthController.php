<?php
namespace App\Http\Controllers;
use Core\Router;
use App\Models\Users;
use App\Models\Login;
use Core\Http\Request;
use Core\Http\Response;
use Core\View\View;

class AuthController  {

  public function onConstruct(){
    $this->view->setLayout('default');
  }

  public function renderLogin(Request $request){
    $v = new View();
    return new Response($v->render('register/login'));

  }


  public function loginAction(Request $request) {
    $loginModel = new Login();
      // form validation
      $this->request->csrfCheck();
      $loginModel->assign($this->request->get());
      $loginModel->validator();
      if($loginModel->validationPassed()){
        $user = Users::findByUsername($_POST['username']);
        if($user && password_verify($this->request->get('password'), $user->password)) {
          $remember = $loginModel->getRememberMeChecked();
          $user->login($remember);
          Router::redirect('');
        }  else {
          $loginModel->addErrorMessage('username','There is an error with your username or password');
        }
      }

  }

  public function logoutAction() {
    if(Users::currentUser()) {
      Users::currentUser()->logout();
    }
    Router::redirect('home');
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
