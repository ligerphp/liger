<?php

namespace App\Exceptions;

use Core\Http\Response;
use Symfony\Component\Debug\Exception\FlattenException;

class ErrorController {
    
    public function exception(FlattenException $exception){

        $msg = 'Something went wrong! => ('.$exception->getMessage().')';
        $res = ['message' => $msg,'code' => $exception->getStatusCode(),'status' => 'failed'];
        return new Response(json_encode($res));
    }

}