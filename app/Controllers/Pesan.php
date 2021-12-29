<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pesan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin | Pesan',
            'pesan' =>  $this->pesan->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/pesan/index', $data);
    }

    public function detail($slug)
    {
        $key = $this->pesan->getPesan($slug);
        if (empty($key['nama'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $data = [
            'title' => 'Admin | ' . $key['nama'],
            'pesan' => $key
        ];
        if (empty($data['pesan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    
        return view('admin/pesan/detail', $data);
    }

    public function delete($id_pesan)
    {
        $this->pesan->delete($id_pesan);
        session()->setFlashdata('pesan', 'Pesan berhasil dihapus.');
        return redirect()->to('admin/pesan');
    }
}