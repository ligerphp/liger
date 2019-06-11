<?php
  namespace Core\Migrations;
  use Core\Database\Ligerbase\DB;

  abstract class Migration{
    protected $_db, $_isCli;
    public $errors;

  protected $_columnTypesMap = [
    'int' => '_intColumn', 'integer' => '_intColumn', 'tinyint' => '_tinyintColumn', 'smallint' => '_smallintColumn',
    'mediumint' => '_mediumintColumn', 'bigint' => '_bigintColumn', 'numeric' => '_decimalColumn', 'decimal' => '_decimalColumn',
    'double' => '_doubleColumn', 'float' => '_floatColumn', 'bit' => '_bitColumn', 'date' => '_dateColumn',
    'datetime' => '_datetimeColumn', 'timestamp' => '_timestampColumn', 'time' => '_timeColumn', 'year' => '_yearColumn',
    'char' => '_charColumn', 'varchar' => '_varcharColumn', 'text' => '_textColumn'
  ];

  public function __construct($isCli){
    $this->_db = DB::getInstance();
    $this->_isCli = $isCli;
  }

  public static function create($table,$callback){
    self::$table = $table;
  }

  abstract function up();

  /**
   * Creates a table in the database
   * @method createTable
   * @param  string      $table name of the db table
   * @return boolean
   */
  public function createTable(){
    $sql = "CREATE TABLE IF NOT EXISTS {$this->table} (
      id INT AUTO_INCREMENT,
      PRIMARY KEY (id)
      )  ENGINE=INNODB;";
    $res = !$this->_db->query($sql)->error();
    // $this->_printColor($res,"Creating Table " . $table);
    if($res){
     $this->error = false;
    return true;
    }else{
      $this->error = true;
      return true;
    }
     
  }

  /**
   * Drops a table in the database
   * @method dropTable
   * @param  string    $table name of table to be dropped
   * @return boolean
   */
  public function dropTable(){
    $sql = "DROP TABLE IF EXISTS {$this->table}";
    $msg =  "Dropping Table " . $this->table;
    $resp = !$this->_db->query($sql)->error();
    $this->_printColor($resp,$msg);
    return $resp;
  }

  /**
   * Add a column to a db table
   * @method addColumn
   * @param  string    $name  name of the column
   * @param  string    $type  type of column varchar, text, int, tinyint, smallint, mediumint, bigint
   * @param  array     $attrs attributes such as size, precision, scale, before, after, definition
   * @return boolean
   */
  public function addColumn($name, $type, $attrs=[]){
    $formattedType = call_user_func([$this,$this->_columnTypesMap[$type]],$attrs);
    $definition = array_key_exists('definition',$attrs)? $attrs['definition']." " : "";
    $order = $this->_orderingColumn($attrs);
    $sql = "ALTER TABLE {$this->table} ADD COLUMN {$name} {$formattedType} {$definition}{$order};";
    $resp = !$this->_db->query($sql)->error();
    return $resp;
  }

  /**
   * Drop Column from table
   * @method dropColumn
   * @param  string     $name  name of column to drop
   * @return boolean
   */
  public function dropColumn( $name){
    $sql = "ALTER TABLE {$this->table} DROP COLUMN {$name};";
    $msg = "Dropping Column " . $name . " From ". $this->table;
    $resp = !$this->_db->query($sql)->error();
    $this->_printColor($resp,$msg);
    return $resp;
  }

  /**
   * Adds created_at and updated_at columns to db table
   * @method addTimeStamps
   * @return boolean
   */
  public function addTimeStamps(){
    $c = $this->addColumn($this->table,'created_at','timestamp',['after'=>'id']);
    $u = $this->addColumn($this->table,'updated_at','timestamp',['after'=>'created_at']);
    $res =  $c && $u;
    if($res){
      $this->errors = false;
    }else{
      $this->errors = true;
    }
    
  }

  /**
   * Add Index to db table
   * @method addIndex
   * @param  string   $name  name of column to add index
   * @return boolean
   */
  public function addIndex($name,$columns=false){
    $columns = (!$columns)? $name : $columns;
    $sql = "ALTER TABLE {$this->table} ADD INDEX {$name} ({$columns})";
    $msg = "Adding Index " . $name . " To ". $this->table;
    $resp = !$this->_db->query($sql)->error();
    // $this->_printColor($resp,$msg);
    // return $resp;
  }

  /**
   * Drops index from table
   * @method dropIndex
   * @param  string    $name  name of column to drop index
   * @return boolean
   */
  public function dropIndex( $name){
    $sql = "DROP INDEX {$name} ON {$this->table}";
    $msg = "Dropping Index " . $name . " From ". $this->table;
    $resp = !$this->_db->query($sql)->error();
    // $this->_printColor($resp,$msg);
    // return $resp;
  }

  /**
   * Adds deleted column to db table to be used for soft deleting rows
   * @method addSoftDelete
   */
  public function addSoftDelete(){
    $this->addColumn($this->table,'deleted','tinyint');
    $this->addIndex($this->table, 'deleted');
  }

  /**
   * run raw SQL statements
   * @method query
   * @param  string $sql SQL Command to run
   * @return boolean
   */
  public function query($sql){
    $msg = "Running Query: \"" . $sql ."\"";
    $resp = !$this->_db->query($sql)->error();
    $this->printColor($resp,$msg);
    return $resp;
  }

  protected function _textColumn($attrs){
    return "TEXT";
  }

  protected function _varcharColumn($attrs){
    $params = $this->_parsePrecisionScale($attrs);
    return "VARCHAR".$params;
  }

  protected function _charColumn($attrs){
    $params = $this->_parsePrecisionScale($attrs);
    return "CHAR".$params;
  }

  protected function _yearColumn($attrs){
    return "YEAR(4)";
  }

  protected function _timeColumn($attrs){
    return "TIME";
  }

  protected function _timestampColumn($attrs){
    return "TIMESTAMP";
  }

  protected function _datetimeColumn($attrs){
    return "DATETIME";
  }

  protected function _dateColumn($attrs){
    return "DATE";
  }

  protected function _bitColumn($attrs){
    return "BIT(" . $attrs['size'] . ")";
  }

  protected function _doubleColumn($attrs){
    $params = $this->_parsePrecisionScale($attrs);
    return "DOUBLE".$params;
  }

  protected function _floatColumn($attrs){
    $params = $this->_parsePrecisionScale($attrs);
    return "FLOAT".$params;
  }

  protected function _decimalColumn($attrs){
    $params = $this->_parsePrecisionScale($attrs);
    return "DECIMAL".$params;
  }

  protected function _bigintColumn($attrs){
    return 'BIGINT';
  }

  protected function _mediumintColumn($attrs){
    return 'MEDIUMINT';
  }

  protected function _smallintColumn($attrs){
    return 'SMALLINT';
  }

  protected function _tinyintColumn($attrs){
    return 'TINYINT';
  }

  protected function _intColumn($attrs){
    return "INT";
  }

  protected function _parsePrecisionScale($attrs){
    $precision = (array_key_exists('precision',$attrs))? $attrs['precision'] : null;
    $precision = (!$precision && array_key_exists('size',$attrs))? $attrs['size'] : $precision;
    $scale = (array_key_exists('scale',$attrs))? $attrs['scale'] : null;
    $params = ($precision)? "(" . $precision : "";
    $params .= ($precision && $scale) ? ", " .$scale : "";
    $params .= ($precision) ? ")" : "";
    return $params;
  }

  protected function _orderingColumn($attrs){
    if(array_key_exists('after',$attrs)){
      return "AFTER " . $attrs['after'];
    } else if(array_key_exists('before',$attrs)){
      return "BEFORE " . $attrs['before'];
    } else {
      return "";
    }
  }

  // protected function _printColor($res,$msg){
  //   $title = ($res)? "SUCCESS: " : "FAIL: ";
  //     $for = ($res)? "\e[0;37;" : "\e[0;37;";
  //     $back = ($res)? "42m" : "41m";
  //     echo $for.$back."\n\n"."    ".$title.$msg."\n\e[0m\n";
  // }
}
