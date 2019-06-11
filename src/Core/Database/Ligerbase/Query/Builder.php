<?php

namespace Core\Database\Ligerbase\Query;


class Builder {
    
    /**
     * 
     * Build Query when comparator signs are used
     * @param $clause string ,eg WHERE
     * 
     */

public function runQueryWithSign($sign,$selector,$match){


        $this->_results =   static::getDb()->find(static::$_table,['conditions' => "$selector = ?",'bind' => [$match]]);
       
        return $this;
}


public function runQueryWithoutSign($selector,$match){
    $this->_results =   static::getDb()->find(static::$_table,['conditions' => "$selector = ?",'bind' => [$match]]);
    
    return $this;    
}


/**
 * Populates the current model object with properties equals to 
 * that of table columns and assin to empty 
 * 
 */
public function populateClassWithTableColumnAsPproperties(){
   $tableColumns =  static::getDb()->get_columnsAndExtract(static::$_table);
   foreach ($tableColumns as $key => $value) {
        $this->{$value} = '';
    }
}

}