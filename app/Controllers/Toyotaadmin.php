<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Slug;

class Toyotaadmin extends BaseController
{
    public function __construct()
    {
        $this->slug = new Slug([
            'field' => 'slug',
            'title' => 'mobil',
            'table' => 'toyota',
            'id'    => 'id_toyota',
        ]);
    }

    public function index()
    {
        $data = [
            'title' => 'Admin - Toyota',
            'toyota' => $this->toyota->orderBy('created_at', 'DESC')->findAll(),
        ];
        
        return view('admin/mobil/toyota/index', $data);
    }

    // DETAIL

    public function detail($slug)
    {
        $key = $this->toyota->getToyota($slug);
        if (empty($key['mobil'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $data = [
            'title' => 'Toyota | ' . $key['mobil'],
            'toyota'=> $key,
        ];
        
        if (empty($data['toyota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('admin/mobil/toyota/detail', $data);
    }

    // CREATE

    public function create()
    {
        $data = [
            'title' => 'Admin | Tambah Data Toyota',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/mobil/toyota/create', $data);
    }

    // SAVE DATA
    
    public function save()
    {
        // validasi input
        if(!$this->validate([
        'mobil' => [
            'rules' => 'required',
            'errors' => [
            'required' => 'Masukkan nama mobil terlebih dahulu.',
            ]
        ],
        'gambar' => [
            'rules' => 'max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
        ]
        ],
        'slide' => [
            'rules' => 'max_size[slide,2048]|mime_in[slide,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'slide2' => [
            'rules' => 'max_size[slide2,2048]|mime_in[slide2,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'slide3' => [
            'rules' => 'max_size[slide3,2048]|mime_in[slide3,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'slide4' => [
            'rules' => 'max_size[slide4,2048]|mime_in[slide4,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'deskripsi' => [
            'rules' => 'required',
            'errors' => [
            'required' => 'Masukkan deskripsi terlebih dahulu.'
            ]
        ]
        ])) {
        return redirect()->back()->withInput();
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        if($fileGambar->getError() == 4) {
        $namaGambar = 'defaultToyota.jpg';
        } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('asset/img/mobil/toyota', $namaGambar);
        }

        // SLIDE 1
        $fileGambar1 = $this->request->getFile('slide');
        if($fileGambar1->getError() == 4) {
        $namaGambar1 = 'defaultToyota.jpg';
        } else {
        $namaGambar1 = $fileGambar1->getRandomName();
        $fileGambar1->move('asset/img/mobil/toyota', $namaGambar1);
        }

        // SLIDE 2
        $fileGambar2 = $this->request->getFile('slide2');
        if($fileGambar2->getError() == 4) {
        $namaGambar2 = 'defaultToyota.jpg';
        } else {
        $namaGambar2 = $fileGambar2->getRandomName();
        $fileGambar2->move('asset/img/mobil/toyota', $namaGambar2);
        }

        // SLIDE 3
        $fileGambar3 = $this->request->getFile('slide3');
        if($fileGambar3->getError() == 4) {
        $namaGambar3 = 'defaultToyota.jpg';
        } else {
        $namaGambar3 = $fileGambar3->getRandomName();
        $fileGambar3->move('asset/img/mobil/toyota', $namaGambar3);
        }

        // SLIDE 4
        $fileGambar4 = $this->request->getFile('slide4');
        if($fileGambar4->getError() == 4) {
        $namaGambar4 = 'defaultToyota.jpg';
        } else {
        $namaGambar4 = $fileGambar4->getRandomName();
        $fileGambar4->move('asset/img/mobil/toyota', $namaGambar4);
        }

        $this->toyota->save([
        'mobil'     => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
        'slug'      => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')]),
        'deskripsi' => $this->request->getVar('deskripsi'),
        'gambar'    => $namaGambar,
        'slide'     => $namaGambar1,
        'slide2'    => $namaGambar2,
        'slide3'    => $namaGambar3,
        'slide4'    => $namaGambar4,
        ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to('admin/toyotaadmin');
    }

    // DELETE DATA
    
    public function delete($id_toyota)
    {
    $toyota = $this->toyota->find($id_toyota);

    // cek jika file gambarnya default
    if($toyota['gambar'] != 'defaultToyota.jpg') {
        unlink('asset/img/mobil/toyota/' . $toyota['gambar']);
    }
    if($toyota['slide'] != 'defaultToyota.jpg') {
        unlink('asset/img/mobil/toyota/' . $toyota['slide']);
    }
    if($toyota['slide2'] != 'defaultToyota.jpg') {
        unlink('asset/img/mobil/toyota/' . $toyota['slide2']);
    }
    if($toyota['slide3'] != 'defaultToyota.jpg') {
        unlink('asset/img/mobil/toyota/' . $toyota['slide3']);
    }
    if($toyota['slide4'] != 'defaultToyota.jpg') {
        unlink('asset/img/mobil/toyota/' . $toyota['slide4']);
    }

    $this->toyota->delete($id_toyota);
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('admin/toyotaadmin');
    }

    // EDIT
    
    public function edit($slug)
    {
        $key = $this->toyota->getToyota($slug);
        $data = [
            'title'         => 'Edit - ' . $key['mobil'],
            'validation'    => \Config\Services::validation(),
            'toyota'        => $key,
        ];

        return view('admin/mobil/toyota/edit', $data);
    }

    // UPDATE

    public function update($id_toyota)
    {
    if(!$this->validate([
        'mobil' => [
            'rules' => 'required',
            'errors' => [
            'required' => 'Masukkan nama mobil terlebih dahulu.',
            ]
        ],
        'gambar' => [
            'rules' => 'max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
        ]
        ],
        'slide' => [
            'rules' => 'max_size[slide,2048]|mime_in[slide,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'slide2' => [
            'rules' => 'max_size[slide2,2048]|mime_in[slide2,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'slide3' => [
            'rules' => 'max_size[slide3,2048]|mime_in[slide3,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'slide4' => [
            'rules' => 'max_size[slide4,2048]|mime_in[slide4,image/jpg,image/jpeg,image/png]',
            'errors'  => [
            'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
        ],
        'deskripsi' => [
            'rules' => 'required',
            'errors' => [
            'required' => 'Masukkan deskripsi terlebih dahulu.'
            ]
        ]
        ])) {
        return redirect()->to('admin/toyotaadmin/edit/' . $this->request->getVar('slug'))
        ->withInput();
        }
    
        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        if($fileGambar->getError() == 4) {
        $namaGambar = $this->request->getVar('gambarLama');
        } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('asset/img/mobil/toyota', $namaGambar);
        ($namaGambar) ? 'defaultToyota.jpg' : unlink('asset/img/mobil/toyota/' . $this->request->getVar('gambarLama'));
        }

        // SLIDE 1
        $fileGambar1 = $this->request->getFile('slide');
        if($fileGambar1->getError() == 4) {
        $namaGambar1 = $this->request->getVar('slideLama');
        } else {
        $namaGambar1 = $fileGambar1->getRandomName();
        $fileGambar1->move('asset/img/mobil/toyota', $namaGambar1);
        ($namaGambar1) ? 'defaultToyota.jpg' : unlink('asset/img/mobil/toyota/' . $this->request->getVar('slideLama'));
        }

        // SLIDE 2
        $fileGambar2 = $this->request->getFile('slide2');
        if($fileGambar2->getError() == 4) {
        $namaGambar2 = $this->request->getVar('slideLama2');
        } else {
        $namaGambar2 = $fileGambar2->getRandomName();
        $fileGambar2->move('asset/img/mobil/toyota', $namaGambar2);
        ($namaGambar2) ? 'defaultToyota.jpg' : unlink('asset/img/mobil/toyota/' . $this->request->getVar('slideLama2'));
        }

        // SLIDE 3
        $fileGambar3 = $this->request->getFile('slide3');
        if($fileGambar3->getError() == 4) {
        $namaGambar3 = $this->request->getVar('slideLama3');
        } else {
        $namaGambar3 = $fileGambar3->getRandomName();
        $fileGambar3->move('asset/img/mobil/toyota', $namaGambar3);
        ($namaGambar3) ? 'defaultToyota.jpg' : unlink('asset/img/mobil/toyota/' . $this->request->getVar('slideLama3'));
        }

        // SLIDE 4
        $fileGambar4 = $this->request->getFile('slide4');
        if($fileGambar4->getError() == 4) {
        $namaGambar4 = $this->request->getVar('slideLama4');
        } else {
        $namaGambar4 = $fileGambar4->getRandomName();
        $fileGambar4->move('asset/img/mobil/toyota', $namaGambar4);
        ($namaGambar4) ? 'defaultToyota.jpg' : unlink('asset/img/mobil/toyota/' . $this->request->getVar('slideLama4'));
        }
        
        $this->toyota->save([
        'id_toyota'     => $id_toyota,
        'mobil'         => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
        'slug'          => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')], $id_toyota),
        'deskripsi'     => $this->request->getVar('deskripsi'),
        'gambar'        => $namaGambar,
        'slide'         => $namaGambar1,
        'slide2'        => $namaGambar2,
        'slide3'        => $namaGambar3,
        'slide4'        => $namaGambar4,
        ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to('admin/toyotaadmin');
    }
}