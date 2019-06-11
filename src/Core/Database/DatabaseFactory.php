<?php

namespace Core\Database;

use PHPUnit\Framework\Constraint\Exception;

class DatabaseFactory {

    public static function connect($dbType){

        if($dbType == ''){
            throw new Exception('Invalid database type');
        }else{
            $className = 'db_'.ucfirst($dbType);
 
            // Assuming Class files are already loaded using autoload concept
            if(class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('Database type not found.');
            }
        }

    }
}