<?php

namespace App\Models;

use CodeIgniter\Model;

class ToyotaModel extends Model
{
    protected $table                = 'toyota';
    protected $primaryKey           = 'id_toyota';
    protected $allowedFields        = ['mobil', 'slug', 'gambar', 'slide', 'slide2', 'slide3', 'slide4', 'deskripsi',];

    // Dates
    protected $useTimestamps        = true;

    public function getToyota($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('toyota')->like('mobil', $keyword);
    }

    public function countToyota()
    {
        return $this->countAll();
    }
}