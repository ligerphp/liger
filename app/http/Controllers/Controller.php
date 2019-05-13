<?php

namespace App\Http\Controllers;

use Core\Http\Response;
class Controller 
{
     //HTTP status codes
     static $HTTP_NOT_FOUND = 404;
     static $HTTP_OK = 200;
     static $HTTP_UNPROCESSABLE_ENTITY = 422;
     static $HTTP_UNAUTHORIZED = 401;
     static $HTTP_BAD_REQUEST = 400;
     static $HTTP_FORBIDDEN = 403;
     static $HTTP_CONFLICT= 409;

     static $FAILED = 'failed';
     static $SUCCESS = 'success';

 
    /**
     * Returns a json when data is not found
     *
     * @param string $message
     * @param array $errors
     * @return json
     */
    public function notFound($message){
        $info = [
            "status" => self::$FAILED,
            "status_code" => self::$HTTP_NOT_FOUND,
            'message' => $message,
        ];
        return Response::json($info,self::$HTTP_NOT_FOUND);
    }
 
 
    /**
     * Executes and returns well formatted json of errors 
     * that occured during validation
     *
     * @param string $message
     * @param collection $errors
     * @return json
     */
    public function validationFailed($message, $errors){
        
        $info = [
                'status' => self::$FAILED,
                'errors' => $errors, 
                'status_code' => self::$HTTP_UNPROCESSABLE_ENTITY, 
                'message' => $message
                
        ];
        return Response::json($info,self::$HTTP_UNPROCESSABLE_ENTITY);
    }
 
 
    /**
     * Returns json stating why a request is unauthorized
     * @param [string] $message
     * @return json
     */
    public function unauthorized($message){
        $info = [
            "status" => self::$FAILED,
            "status_code" => self::$HTTP_UNAUTHORIZED,
            'message' => $message,
        ];
        return Response::json($info,self::$HTTP_UNAUTHORIZED);
    }
 
 
    /**
     * Returns json stating why data creation failed
     * @param [string] $message
     * @return json
     */
    public function dataCreationFailed($message){
        $info = [
            "status" => self::$FAILED,
            "status_code" => self::$HTTP_BAD_REQUEST,
            'message' => $message,
        ];
        return Response::json($info,self::$HTTP_BAD_REQUEST);
    }
 
 
    /**
     * Returns json stating why data creation failed
     * @param [string] $message
     * @return json
     */
    public function actionSuccess($message){
        $info = [
            "status" => self::$SUCCESS,
            "status_code" => self::$HTTP_OK,
            'message' => $message,
        ];
        return Response::json($info,self::$HTTP_OK);
    }

    /**
     *
     * @param [string] $message
     * @return json
     */
    public function success($data){
        $info = [
            "data" => $data,
            "status" => self::$SUCCESS,
            "status_code" => self::$HTTP_OK,
            'message' => 'successful',
        ];
        return Response::json($info,self::$HTTP_OK);
    }
 
 
    /**
     * Returns json stating why data creation failed
     * @param [string] $message
     * @return json
     */
    public function actionFailure($message){
        $info = [
            "status" => self::$FAILED,
            "status_code" => self::$HTTP_CONFLICT,
            'message' => $message,
        ];
        return Response::json($info,self::$HTTP_CONFLICT);
    }
 
 
    /**
     * Returns json 
     * @param [string] $message
     * @return json
     */
    public function forbidden($message){
        $info = [
            "status" => self::$FAILED,
            "status_code" => self::$HTTP_FORBIDDEN,
            'message' => $message,
        ];
        return Response::json($info,self::$HTTP_FORBIDDEN);
    }
}
