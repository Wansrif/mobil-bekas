<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Honda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_honda' => [
                'type'          => 'VARCHAR',
                'constraint'    => 36,
            ],
            'mobil' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'slug' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'gambar' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'slide' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'slide2' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'slide3' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'slide4' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'deskripsi' => [
                'type'          => 'TEXT',
                'null'          => true,
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
        ]);
        $this->forge->addKey('id_honda', true);
        $this->forge->createTable('honda');
    }

    public function down()
    {
        $this->forge->dropTable('honda');
    }
}