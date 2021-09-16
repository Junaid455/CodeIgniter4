<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosts extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => "INT",
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'title' => [
                'type' => "VARCHAR",
                'constraint' => 100,
            ],
            'body' => [
                'type' => "TEXT",
                'null' => TRUE,
            ],
            'slug' => [
                'type' => "VARCHAR",
                'constraint' => 255,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
