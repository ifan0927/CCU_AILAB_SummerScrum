<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Happly extends Migration
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
        'title' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => True
        ],
        'url' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => True
        ],
        'file' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => True
        ],
        'content' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => True
        ],
        'start' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => True
        ],
        'end' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
            'null' => True
        ]
    ]);
    $this->forge->addkey('id',True);
    $this->forge->createTable('happly');
    }

    public function down()
    {
        $this->forge->dropTable('happly');
    }
}
