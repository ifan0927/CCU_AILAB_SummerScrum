<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Marquee extends Migration
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
            'marquee' =>[
                'type' =>'VARCHAR',
                'constraint' =>'200',
                'null' => True
            ],
        ]);
        $this->forge->addKey('id',True);
        $this->forge->createTable('marquee');
    }

    public function down()
    {
        $this->forge->dropTable('marquee');
    }
}
