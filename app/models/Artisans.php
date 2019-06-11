<?php
namespace App\Models;
use Core\Database\Ligerbase\Model\Model;

class Artisans extends Model {

  protected static $_table='artisans', $_softDelete = true;
 
  const blackListedFormKeys = ['id','deleted'];
  protected $fillable = ['id','user_id','location','end','category','phonenumber','start','updated_at','deleted_at','created_at'];
  public $autoincrement = true;


}
