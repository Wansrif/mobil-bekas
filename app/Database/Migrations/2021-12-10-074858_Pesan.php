<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pesan' =>[
                'type'          => 'VARCHAR',
                'constraint'    => 36,
            ],
            'nama' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'slug' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'whatsapp' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'email' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'pesan' =>[
                'type'  => 'TEXT',
                'null'  => true,
            ],
            'created_at' =>[
                'type'  => 'DATETIME',
                'null'  => true,
            ],
        ]);
        // Primary key
        $this->forge->addKey('id_pesan', true);
        // Create Tabel
        $this->forge->createTable('pesan', true);
    }

    public function down()
    {
        // Delete Tabel
        $this->forge->dropTable('pesan');
    }
}