<?php
namespace Database\Migrations;

use Core\Migration;

class Migration5cd1d7923cea5_User extends Migration
{

    public function up()
    {
        $this->table = "users";
        $this->createTable($this->table);
        $this->addTimeStamps($this->table);
        $this->addColumn($this->table, 'username', 'varchar', ['size' => 150]);
        $this->addColumn($this->table, 'email', 'varchar', ['size' => 150]);
        $this->addColumn($this->table, 'password', 'varchar', ['size' => 150]);
        $this->addColumn($this->table, 'fname', 'varchar', ['size' => 150]);
        $this->addColumn($this->table, 'lname', 'varchar', ['size' => 150]);
        $this->addColumn($this->table, 'acl', 'text');
        $this->addSoftDelete($this->table);
        $this->addIndex($this->table, 'created_at');
        $this->addIndex($this->table, 'updated_at');
    }

    public function down()
    {

        //code to destroy migration
        $this->dropTable($this->table);

    }
}
