<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->validation = \Config\Services::validation();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Kategori',
        ];

        return view('admin/kategori/index', $data);
    }
    
    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'kategori'  => $this->kategori->orderBy('created_at', 'DESC')->findAll(),
            ];
    
            $output = view('admin/kategori/data', $data);
            echo json_encode($output);
        }
    }


    // ADD KATEGORI
    public function addKategori()
    {
        if ($this->request->isAJAX()) {
            $this->validate([
                'kategori' => [
                    'rules' => 'required|is_unique[kategori.nama_kategori]',
                    'errors' => [
                        'required' => 'Masukkan {field} terlebih dahulu.',
                        'is_unique' => 'Nama {field} sudah ada.'
                    ]
                ],
            ]);
    
            if ($this->validation->run() == FALSE) {
                $errors = $this->validation->getErrors();
                return $this->response->setJSON(['code'=>0, 'error'=>$errors]);
            } else{
                $data = [
                    'nama_kategori' => $this->request->getPost('kategori'),
                ];
                $query = $this->kategori->insert($data);
                if ($query) {
                    return $this->response->setJSON(['code'=>1, 'msg'=>'Kategori berhasil ditambah!']);
                } else {
                    return $this->response->setJSON(['code'=>0, 'msg'=>'Maaf sedang terjadi kesalahan']);
                }
            }
        }
    }


    // EDIT
    public function editKategori()
    {
        if ($this->request->isAJAX()) {
            $id_kategori = $this->request->getVar('id_kategori');
            $data['kategori'] = $this->kategori->getKategori($id_kategori);
            echo json_encode(['code'=>1, 'msg'=>'success', 'results'=>$data]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    // UPDATE
    public function updateKategori()
    {
        if ($this->request->isAJAX()) {
            $id_kategori = $this->request->getPost('kid');
            $this->validate([
                'nama_kategori' => [
                    'rules' => 'required|is_unique[kategori.nama_kategori]',
                    'errors' => [
                        'required' => 'Masukkan kategori terlebih dahulu.',
                        'is_unique' => 'Nama kategori sudah ada.'
                    ]
                ],
            ]);
    
            if ($this->validation->run() == FALSE) {
                $errors = $this->validation->getErrors();
                return $this->response->setJSON(['code'=>0, 'error'=>$errors]);
            } else {
                $data = [
                    'nama_kategori' => $this->request->getPost('nama_kategori'),
                ];
                $query = $this->kategori->update($id_kategori,$data);
                if ($query) {
                    return $this->response->setJSON(['code'=>1, 'msg'=>'Kategori berhasil diupdate!']);
                } else {
                    return $this->response->setJSON(['code'=>0, 'msg'=>'Maaf sedang terjadi kesalahan']);
                }
            }
        }
    }


    // GET DELETE DATA
    public function getDelete()
    {
        if ($this->request->isAJAX()) {
            $id_kategori = $this->request->getVar('id_kategori');
            $data['kategori'] = $this->kategori->getKategori($id_kategori);
            echo json_encode(['code'=>1, 'msg'=>'success', 'results'=>$data]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    // DELETE DATA
    public function deleteKategori()
    {
        if ($this->request->isAJAX()) {
            $id_kategori = $this->request->getPost('id_kategori');
            $query = $this->kategori->delete($id_kategori);
            if ($query) {
                return $this->response->setJSON(['code'=>1, 'msg'=>'Kategori berhasil dihapus!']);
            } else {
                return $this->response->setJSON(['code'=>0, 'msg'=>'Maaf sedang terjadi kesalahan']);
            }
        }
    }
}