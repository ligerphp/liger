<?php


class db_mongobd {

    /**
     * A connection instance for mongodb
     */
    protected $conn;

    private function __construct($remote = ''){
         // connect to mongodb
    $this->m = new MongoClient($remote ? $remote : '');
    
    $this->dbname =    getenv('MONGO_DB_DATABASE');
   // select a database
    $this->db = $this->m->dbname;

    }
}