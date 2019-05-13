<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Core\View\View;
use Core\Http\Response;
use Core\Http\Request;
use App\Http\Controllers\Controller;


class RegisterController extends Controller{

    public function index(Request $request){
        $user = new Users();
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->fname = $request->get('fname');
        $user->lname = $request->get('lname');
        $user->confirm = $request->get('confirm');
        $user->save();
        
        if($user->save()) {
            return $this->actionSuccess('User was created');
        }else {
            return $this->actionFailure('Could not create a new user');
        } 
    }

    public function render(){
     
        $v = new View();
        return new Response($v->render('register/register'));
    
    }
}