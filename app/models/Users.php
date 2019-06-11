<?php
namespace App\Models;
use Core\Database\Ligerbase\Model\Model;

class Users extends Model {

  protected static $_table='users', $_softDelete = true;
 
  const blackListedFormKeys = ['id','deleted'];
  protected $fillable = ['id','email','fname','lname','password','username','isArtisan','created_at','acl','deleted_at'];



}
