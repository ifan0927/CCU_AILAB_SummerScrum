<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Controlsysstar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => True,
                'auto_increment' => True
            ],
            'syscatagory_star' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'systitle_star' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'sysurl_star' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'syscontent_star' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'sysstart_star' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'sysend_star' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
        ]);
        $this->forge->addkey('id',True);
        $this->forge->createTable('sys_star');
    }

    public function down()
    {
        $this->forge->dropTable('sys_star');
    }
}
