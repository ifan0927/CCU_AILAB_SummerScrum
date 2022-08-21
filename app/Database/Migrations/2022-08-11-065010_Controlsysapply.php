<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Controlsysapply extends Migration
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
            'syscatagory_apply' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'systitle_apply' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'sysurl_apply' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'syscontent_apply' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'sysstart_apply' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
            'sysend_apply' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => True
            ],
        ]);
        $this->forge->addkey('id',True);
        $this->forge->createTable('sys_apply');
    }

    public function down()
    {
        $this->forge->dropTable('sys_apply');
    }
}
