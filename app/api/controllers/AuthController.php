<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Artisans;
use Core\Http\Request;
use Core\JWT\JWTAuth;


class AuthController extends Controller
{
    

    /**
     * Middleware to run before calling the actual method handling the ewquest
     */
    public function _middleware(){

    }


    public function jwtLogin(Request $request){

        $jwt =  new JWTAuth($request);

        $token =  $jwt->auth()->login();
    
        return $this->actionSuccess(['token' => $token]);
    
    }

    
    
    /**
     * Login using User Model
     * 
     */
    public function login(Request $request)
    {
        // runs quick sanitization on all request data
        $request->validate();

        $email = $request->get('email');
        $password = $request->get('password');

        $user = new Users();

        $f_user = $user->where('email', '=', $email)->firstAndSecond();
        if ($f_user) {
            if (password_verify($password, $f_user->password)) {
                return $this->actionSuccess('User was authenticated');
            } else {
                return $this->actionFailure('Email or password does not match');
            }
        } else {
            return $this->actionFailure('No user found with Email');

        }
    }

    public function register(Request $request)
    {
        
        // runs quick sanitization on all request data
        $request->validate();

        $email = $request->get('email');
        $password = $request->get('password');
        $confirm_password = $request->get('confirm_password');
        $role = $request->get('role');
        $phonenumber = $request->get('phone');
        $location = $request->get('location');
        $firstname = $request->get('first_name');
        $lastname = $request->get('last_name');

        if(!isset($role) || $role == ''){
            return $this->actionFailure('Set a user role');
        }
        if($password === $confirm_password){
            if($password === ''){
            return $this->actionFailure('Passwords cannot be left empty');

            }
        if($role == 'regular'){
            $user = new Users();
            $user->email = $email;
            $user->password = password_hash($password,PASSWORD_BCRYPT);
            $user->role = $role;
            $user->isArtisan = 0;
        }else{
            $user = new Users();
            $user->email = $email;
            $user->password = password_hash($password,PASSWORD_BCRYPT);
            $user->role = $role;
            $user->isArtisan = 1;
        }



        if($user->save()){

            $artisan = new Artisans();
            $artisan->user_id = $user->id;    
            $artisan->location = $location;
            $artisan->phonenumber = $phonenumber;
            $artisan->firstname = $firstname;
            $artisan->lastname = $lastname;

            if($artisan->save()){
                return $this->actionSuccess('Artisan was Created Successfully');
            }else{
                return $this->actionFailure('Failed to create artisan table');

            }

        }else{
                return $this->actionFailure('User could not be created');
        }
        }else{
            return $this->actionFailure('Passwords do not match');

        }


    }
}
