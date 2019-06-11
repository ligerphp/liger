<?php
namespace Database\Migrations;

use Core\Migrations\Migration;


class Artisans extends Migration {
         
public function up() 
{
        
    $this->table = "artisans";
    $this->createTable();
    $this->addTimeStamps();
    $this->addColumn( 'user_id', 'varchar', ['size' => 150]);
    $this->addColumn( 'phonenunmber', 'varchar', ['size' => 150]);
    $this->addColumn( 'location', 'varchar', ['size' => 150]);
    $this->addColumn( 'start', 'varchar', ['size' => 150]);
    $this->addColumn( 'end', 'varchar', ['size' => 150]);
    $this->addSoftDelete();
    $this->addIndex( 'created_at');
    $this->addIndex( 'updated_at');
}

public function down()
{
//code to destroy migration
}
        }
        
