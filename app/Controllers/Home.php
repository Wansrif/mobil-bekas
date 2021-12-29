<?php

namespace App\Controllers;

use App\Libraries\Slug;
use App\Models\PesanModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->pesan = new PesanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | Pafona Auto',
        ];

        return view('user/index', $data);
    }

    public function kirim()
    {
        $this->validate([
            'nama' => [
                'rules'     => 'required|alpha_numeric_space',
                'errors'    => [
                    'required' => 'Masukkan {field} terlebih dahulu.',
                ]
            ],
            'email' => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => 'Masukkan {field} terlebih dahulu.',
                    'valid_email'   => 'Email yang dimasukkan tidak valid.',
                ]
            ],
            'whatsapp' => [
                'rules'     => 'required|numeric|max_length[13]',
                'errors'    => [
                    'numeric'       => 'Hanya berisi angka',
                    'required'      => 'Masukkan nomor {field} terlebih dahulu.',
                    'max_length'    => 'Panjang nomor 13 karakter',
                ]
            ],
            'pesan' => [
                'rules'     => 'required|max_length[500]',
                'errors'    => [
                    'required'      => 'Masukkan {field} terlebih dahulu.',
                    'max_length'    => 'Maksimal pesan berisi 500 karakter.',
                ]
            ],
        ]);

        if ($this->validation->run() == FALSE) {
            $errors = $this->validation->getErrors();
            return $this->response->setJSON(['code'=>0, 'error'=>$errors]);
        } else{
            $slug = new Slug([
                'field' => 'slug',
                'title' => 'nama',
                'table' => 'pesan',
                'id'    => 'id_pesan',
            ]);
            
            $data = $this->pesan->insert([
                'nama'      => $this->request->getVar('nama', FILTER_SANITIZE_STRING),
                'slug'      => $slug->create_uri(['nama' => $this->request->getVar('nama')]),
                'whatsapp'  => $this->request->getVar('whatsapp', FILTER_SANITIZE_STRING),
                'email'     => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),
                'pesan'     => $this->request->getVar('pesan', FILTER_SANITIZE_STRING),
            ]);
            if ($this->request->isAJAX($data)) {
                return $this->response->setJSON(['code'=>1, 'msg'=>'Pesan berhasil dikirim!']);
            } else {
                return $this->response->setJSON(['code'=>0, 'msg'=>'Maaf sedang terjadi kesalahan']);
            }
        }
    }
}