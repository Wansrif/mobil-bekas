<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjualan' =>[
                'type'              => 'INT',
                'constraint'        => 6,
                'auto_increment'    => true,
            ],
            'pembeli' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'mobil' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'slug' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'gambar' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'nama_kategori' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'harga' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'waktu' =>[
                'type'  => 'DATE',
                'null'  => true,
            ],
            'whatsapp' =>[
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
        $this->forge->addKey('id_penjualan', true);
        // Create Tabel
        $this->forge->createTable('penjualan', true);
    }

    public function down()
    {
        // Delete Tabel
        $this->forge->dropTable('penjualan');
    }
}