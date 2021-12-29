<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class PesanModel extends UuidModel
{
    protected $uuidUseBytes         = false;
    protected $uuidFields           = ['id_pesan'];

    protected $table                = 'pesan';
    protected $primaryKey           = 'id_pesan';

    protected $returnType           = 'array';
    protected $allowedFields        = ['nama', 'slug','email', 'whatsapp', 'pesan',];

    // Dates
    protected $useTimestamps        = true;
    protected $updatedField;

    public function getpesan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function countPesan()
    {
        return $this->countAll();
    }
}