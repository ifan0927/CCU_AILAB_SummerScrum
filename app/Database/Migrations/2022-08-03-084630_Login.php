<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Login extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'=> 'INT',
                'constraint' => 5,
                'unsigned' => True,
                'auto_increment' => True
        ],
            'NAME' => [
                'type'=> 'TEXT',
                'constraint' => '20',
                'null' => True
        ],
            'USERNAME' => [
                'type'=> 'TEXT',
                'constraint' => '20',
                'null' => True
        ],
            'MAIL' => [
                'type'=> 'TEXT',
                'constraint' => '30',
                'null' => True
        ],
            'PASSWORD' => [
                'type'=> 'TEXT',
                'constraint' => '30',
                'null' => True
        ],
    
    ]);
    $this->forge->addKey('id',True);
    $this->forge->createTable('USERS');
}

    public function down()
    {
        $this->forge->dropTable('USERS');
    }
}
