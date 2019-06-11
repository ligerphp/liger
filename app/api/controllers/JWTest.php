<?php
namespace App\Api\Controllers;

use Core\JWT\JWTAuth;
use Core\Http\Request;
use App\Http\Controllers\Controller;

class JWTest extends Controller{

public function test(Request $request){

    $jwt =  new JWTAuth($request);  
    // return $jwt->make();
    // return $jwt->makeWithCustomClaims(['email' => $request->get('email'),'passwor' => $request->get('password')]);
    
    // return $jwt->setISS();
    // return $jwt->setAud();
    // return $jwt->setExpires();
    // return $jwt->isValid();

    // return $jwt->auth()->fromRequest();
    $token =  $jwt->auth()->login();

    // return $jwt->auth()->isUser();
    return $this->actionSuccess(['token' => $token]);

}

}