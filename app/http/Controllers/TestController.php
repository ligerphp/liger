<?php

namespace App\Http\Controllers;

use Core\Http\Response;


class TestController {

    public function index(){
        return new Response('Get method');
    }
    public function post(){
        return new Response('Post method');
    }
}
