<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mitsubishi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mitsubishi' => [
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
        $this->forge->addKey('id_mitsubishi', true);
        $this->forge->createTable('mitsubishi');
    }

    public function down()
    {
        $this->forge->dropTable('mitsubishi');
    }
}