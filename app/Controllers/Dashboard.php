<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'toyota'        => $this->toyota->countToyota(),
            'mitsubishi'    => $this->mitsubishi->countMitsubishi(),
            'honda'         => $this->honda->countHonda(),
            'penjualan'     => $this->penjualan->countPenjualan(),
            'pesan'         => $this->pesan->countPesan(),
        ];

        return view('admin/dashboard', $data);
    }
}