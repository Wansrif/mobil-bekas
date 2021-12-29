<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class HondaModel extends UuidModel
{
    protected $uuidUseBytes         = false;
    protected $uuidFields           = ['id_honda'];

    protected $table                = 'honda';
    protected $primaryKey           = 'id_honda';

    protected $returnType           = 'array';
    protected $allowedFields        = ['mobil', 'slug', 'gambar', 'slide', 'slide2', 'slide3', 'slide4', 'deskripsi'];

    // Dates
    protected $useTimestamps        = true;

    public function getHonda($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('honda')->like('mobil', $keyword);
    }

    public function countHonda()
    {
        return $this->countAll();
    }
}