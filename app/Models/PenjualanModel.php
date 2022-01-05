<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table                = 'penjualan';
    protected $primaryKey           = 'id_penjualan';
    protected $allowedFields        = ['pembeli','mobil', 'spesifikasi', 'slug', 'gambar', 'nama_kategori', 'waktu', 'harga', 'whatsapp',];

    // Dates
    protected $useTimestamps        = true;

    public function getPenjualan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getDate($min, $max)
    {
        // return $this->table('penjualan')->where('waktu >=', $min)->where('waktu <=', $max);
        return $this->table('penjualan')->where("waktu BETWEEN '{$min}' AND '{$max}'");
    }

    public function countPenjualan()
    {
        return $this->countAll();
    }
}