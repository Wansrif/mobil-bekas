<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Slug;

class Mitsubishiadmin extends BaseController
{
    public function __construct()
    {
        $this->slug = new Slug([
            'field' => 'slug',
            'title' => 'mobil',
            'table' => 'mitsubishi',
            'id'    => 'id_mitsubishi',
        ]);
    }
    
    public function index()
    {
        $data = [
            'title'         => 'Admin | Mitsubishi',
            'mitsubishi'    => $this->mitsubishi->orderBy('created_at', 'DESC')->findAll(),
        ];
        
        return view('admin/mobil/mitsubishi/index', $data);
    }

  // DETAIL

    public function detail($slug)
    {
    $key = $this->mitsubishi->getMitsubishi($slug);
    if (empty($key['mobil'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }

    $data = [
        'title'         => 'Mitsubishi | ' . $key['mobil'],
        'mitsubishi'    => $key,
    ];
    if (empty($data['mitsubishi'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }

    return view('admin/mobil/mitsubishi/detail', $data);
    }

  // CREATE

    public function create()
    {
    $data = [
        'title' => 'Admin | Tambah Data Mitsubishi',
        'validation' => \Config\Services::validation(),
    ];

    return view('admin/mobil/mitsubishi/create', $data);
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

    // Gambar
    $fileGambar = $this->request->getFile('gambar');
    if($fileGambar->getError() == 4) {
    $namaGambar = 'defaultMitsubishi.jpg';
    } else {
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('asset/img/mobil/mitsubishi', $namaGambar);
    }

    // SLIDE 1
    $fileGambar1 = $this->request->getFile('slide');
    if($fileGambar1->getError() == 4) {
    $namaGambar1 = 'defaultMitsubishi.jpg';
    } else {
    $namaGambar1 = $fileGambar1->getRandomName();
    $fileGambar1->move('asset/img/mobil/mitsubishi', $namaGambar1);
    }

    // SLIDE 2
    $fileGambar2 = $this->request->getFile('slide2');
    if($fileGambar2->getError() == 4) {
    $namaGambar2 = 'defaultMitsubishi.jpg';
    } else {
    $namaGambar2 = $fileGambar2->getRandomName();
    $fileGambar2->move('asset/img/mobil/mitsubishi', $namaGambar2);
    }

    // SLIDE 3
    $fileGambar3 = $this->request->getFile('slide3');
    if($fileGambar3->getError() == 4) {
    $namaGambar3 = 'defaultMitsubishi.jpg';
    } else {
    $namaGambar3 = $fileGambar3->getRandomName();
    $fileGambar3->move('asset/img/mobil/mitsubishi', $namaGambar3);
    }

    // SLIDE 4
    $fileGambar4 = $this->request->getFile('slide4');
    if($fileGambar4->getError() == 4) {
    $namaGambar4 = 'defaultMitsubishi.jpg';
    } else {
    $namaGambar4 = $fileGambar4->getRandomName();
    $fileGambar4->move('asset/img/mobil/mitsubishi', $namaGambar4);
    }

    $this->mitsubishi->save([
    'mobil' => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
    'slug'  => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')]),
    'deskripsi' => $this->request->getVar('deskripsi'),
    'gambar' => $namaGambar,
    'slide' => $namaGambar1,
    'slide2' => $namaGambar2,
    'slide3' => $namaGambar3,
    'slide4' => $namaGambar4,
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to('admin/mitsubishiadmin');
    }

  // DELETE DATA
    
    public function delete($id_mitsubishi)
    {
    $mitsubishi = $this->mitsubishi->find($id_mitsubishi);

    // cek jika file gambarnya default
    if($mitsubishi['gambar'] != 'defaultMitsubishi.jpg') {
        unlink('asset/img/mobil/mitsubishi/' . $mitsubishi['gambar']);
    }
    if($mitsubishi['slide'] != 'defaultMitsubishi.jpg') {
        unlink('asset/img/mobil/mitsubishi/' . $mitsubishi['slide']);
    }
    if($mitsubishi['slide2'] != 'defaultMitsubishi.jpg') {
        unlink('asset/img/mobil/mitsubishi/' . $mitsubishi['slide2']);
    }
    if($mitsubishi['slide3'] != 'defaultMitsubishi.jpg') {
        unlink('asset/img/mobil/mitsubishi/' . $mitsubishi['slide3']);
    }
    if($mitsubishi['slide4'] != 'defaultMitsubishi.jpg') {
        unlink('asset/img/mobil/mitsubishi/' . $mitsubishi['slide4']);
    }

    $this->mitsubishi->delete($id_mitsubishi);
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('admin/mitsubishiadmin');
    }

    // EDIT
    
    public function edit($slug)
    {
    $key = $this->mitsubishi->getMitsubishi($slug);
    $data = [
        'title'         => 'Edit | ' . $key['mobil'],
        'validation'    => \Config\Services::validation(),
        'mitsubishi'    => $key,
    ];

    return view('admin/mobil/mitsubishi/edit', $data);
    }

  // UPDATE

    public function update($id_mitsubishi)
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
            return redirect()->to('admin/mitsubishiadmin/edit/' . $this->request->getVar('slug'))
            ->withInput();
            }
        
        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        if($fileGambar->getError() == 4) {
        $namaGambar = $this->request->getVar('gambarLama');
        } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('asset/img/mobil/mitsubishi', $namaGambar);
        ($namaGambar) ? 'defaultMitsubishi.jpg' : unlink('asset/img/mobil/mitsubishi/' . $this->request->getVar('gambarLama'));
        }

        // SLIDE 1
        $fileGambar1 = $this->request->getFile('slide');
        if($fileGambar1->getError() == 4) {
        $namaGambar1 = $this->request->getVar('slideLama');
        } else {
        $namaGambar1 = $fileGambar1->getRandomName();
        $fileGambar1->move('asset/img/mobil/mitsubishi', $namaGambar1);
        ($namaGambar1) ? 'defaultMitsubishi.jpg' : unlink('asset/img/mobil/mitsubishi/' . $this->request->getVar('slideLama'));
        }

        // SLIDE 2
        $fileGambar2 = $this->request->getFile('slide2');
        if($fileGambar2->getError() == 4) {
        $namaGambar2 = $this->request->getVar('slideLama2');
        } else {
        $namaGambar2 = $fileGambar2->getRandomName();
        $fileGambar2->move('asset/img/mobil/mitsubishi', $namaGambar2);
        ($namaGambar2) ? 'defaultMitsubishi.jpg' : unlink('asset/img/mobil/mitsubishi/' . $this->request->getVar('slideLama2'));
        }

        // SLIDE 3
        $fileGambar3 = $this->request->getFile('slide3');
        if($fileGambar3->getError() == 4) {
        $namaGambar3 = $this->request->getVar('slideLama3');
        } else {
        $namaGambar3 = $fileGambar3->getRandomName();
        $fileGambar3->move('asset/img/mobil/mitsubishi', $namaGambar3);
        ($namaGambar3) ? 'defaultMitsubishi.jpg' : unlink('asset/img/mobil/mitsubishi/' . $this->request->getVar('slideLama3'));
        }

        // SLIDE 4
        $fileGambar4 = $this->request->getFile('slide4');
        if($fileGambar4->getError() == 4) {
        $namaGambar4 = $this->request->getVar('slideLama4');
        } else {
        $namaGambar4 = $fileGambar4->getRandomName();
        $fileGambar4->move('asset/img/mobil/mitsubishi', $namaGambar4);
        ($namaGambar4) ? 'defaultMitsubishi.jpg' : unlink('asset/img/mobil/mitsubishi/' . $this->request->getVar('slideLama4'));
        }

        $this->mitsubishi->save([
        'id_mitsubishi' => $id_mitsubishi,
        'mobil'         => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
        'slug'          => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')], $id_mitsubishi),
        'deskripsi'     => $this->request->getVar('deskripsi', FILTER_SANITIZE_STRING),
        'gambar'        => $namaGambar,
        'slide'         => $namaGambar1,
        'slide2'        => $namaGambar2,
        'slide3'        => $namaGambar3,
        'slide4'        => $namaGambar4,
        ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to('admin/mitsubishiadmin');
    }
}