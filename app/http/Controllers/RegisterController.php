<?php

namespace App\Http\Controllers;

use Core\View\View;
use Core\Http\Response;
use Core\Http\Request;
use App\Http\Controllers\Controller;


class RegisterController extends Controller{

    public function index(Request $request){
        $user = app('auth')->fresh();

        if($user) {
            return response()->withRedirect('/');
        }else {
            return response()->withRedirect('/auth/register');
        } 
    }

    public function render(){
     
        $v = new View();
        return new Response($v->render('register/register'));
    
    }
}