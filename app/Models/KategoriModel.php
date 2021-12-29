<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table                = 'kategori';
    protected $primaryKey           = 'id_kategori';
    protected $allowedFields        = ['nama_kategori'];

    // Dates
    protected $useTimestamps        = true;

    public function getKategori($id_kategori = false)
    {
        if ($id_kategori == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id_kategori])->first();
    }

    public function search($keyword)
    {
        return $this->table('kategori')->like('nama_kategori', $keyword);
    }

    public function countKategori()
    {
        return $this->countAll();
    }
}