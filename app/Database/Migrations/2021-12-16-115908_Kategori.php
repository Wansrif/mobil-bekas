<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' =>[
                'type'  => 'INT',
                'constraint'    => 11,
                'auto_increment'    => true,
            ],
            'nama_kategori' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'created_at' =>[
                'type'  => 'DATETIME',
                'null'  => true,
            ],
            'updated_at' =>[
                'type'  => 'DATETIME',
                'null'  => true,
            ],
        ]);
        // Primary key
        $this->forge->addKey('id_kategori', true);
        // Create Tabel
        $this->forge->createTable('kategori', true);
    }

    public function down()
    {
        // Delete Tabel
        $this->forge->dropTable('kategori');
    }
}