<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmployee extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        // $this->forge->dropTable('news');
    }
}
