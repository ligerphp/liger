<?php
namespace Core\Database\Ligerbase\Model;

// use Core\Contracts\Database\QueryContracts;
use Core\Database\Ligerbase\Query\Builder as QueryBuilder;


class Builder  extends QueryBuilder{


    protected $searchBox = ['=','>','<','>=','<=','!='], $usingSign = false, $signUsed = null;
 
    public function where($selector,$sign = '',$match = ''){
       // where('legs','>',0)
       foreach ($this->searchBox as $key ) {
           if($sign == $key){
               $this->usingSign = true;
               $this->signUsed = $key;
           }
       }

       if($this->usingSign && $this->signUsed != '='){
         return  $this->runQueryWithSign($this->signUsed,$selector,$match);
       }else {
          return $this->runQueryWithoutSign($selector,$match);
       }

    }

        /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     *
     * @throws \Illuminate\Database\Eloquent\JsonEncodingException
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }

        return $json;
    }



     /**
     * Add an "or where" clause to the query.
     *
     * @param  \Closure|array|string  $column
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function orWhere($column, $operator = null, $value = null)
    {
        list($value, $operator) = $this->query->prepareValueAndOperator(
            $value, $operator, func_num_args() === 2
        );

        return $this->where($column, $operator, $value, 'or');
    }

    public function create(){

    }

    public function count(){


    }

    public function max(){

    }

    public function avg(){


    }

    public function sum(){

    }

    public function diff(){

    }


    /**
     * Number of rows to return
     */
    public function take(){

    }

    public function get(){
        return json_encode($this->_results);
    }

    /**
     * Return all rows in table
     * @return void
     */
    public static function all(){
        $results =   static::getDb()->find(static::$_table,['conditions' => "",'bind' => []]);
        return $results;   
    }
    


    /**
     * Returns the first match for conditions suppllied
     */
    public function first(){
       
        $data =  isset($this->_results) ? $this->_results : null;
        
        $this->populateClassWithTableColumnAsPproperties();

        if($this->_results === false) return [];
        
        foreach ($data[0] as $key => $value) {
            $this->{$key} = $value;
        }

        return $data[0];
    }

    /**
     * Returns the first match for conditions suppllied
     */
    public function firstAndSecond(){
       
        $data =  isset($this->_results) ? $this->_results : null;
        
        $this->populateClassWithTableColumnAsPproperties();

        if($this->_results === false) return [];
        if(isset($data[0])){
            $firstRow = $data[0];
        }else{
            $firstRow = null;
        }
        if(isset($data[1])){
            $secondRow = $data[1];
        }else{
            $secondRow = null;
        }

        return [$firstRow,$secondRow];
    }

    


    public function orderBy($order){

    }
    public function limit($limit){
    
    }

    public function paginate(){

    }

    public function toArray(){

    }

    public function findOrFail(){

    }

    public function firstOrFail(){

    }

    public static function findByUsername($username) {
        return self::findFirst(['conditions'=> "username = ?", 'bind'=>[$username]]);
    }

    /**
     * Checks if query returns a valida user
     * 
     */
    
  public static function isUser() {

  }
    
}