<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class MitsubishiModel extends UuidModel
{
    protected $uuidUseBytes         = false;
    protected $uuidFields           = ['id_mitsubishi'];

    protected $table                = 'mitsubishi';
    protected $primaryKey           = 'id_mitsubishi';

    protected $returnType           = 'array';
    protected $allowedFields        = ['mobil', 'slug', 'gambar', 'slide', 'slide2', 'slide3', 'slide4', 'deskripsi'];

    // Dates
    protected $useTimestamps        = true;

    public function getMitsubishi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('mitsubishi')->like('mobil', $keyword);
    }

    public function countMitsubishi()
    {
        return $this->countAll();
    }
}