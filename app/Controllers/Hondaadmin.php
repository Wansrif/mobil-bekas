<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Slug;

class Hondaadmin extends BaseController
{
    public function __construct()
    {
        $this->slug = new Slug([
            'field' => 'slug',
            'title' => 'mobil',
            'table' => 'honda',
            'id'    => 'id_honda',
        ]);
    }
    
	public function index()
	{
		$data = [
			'title'    => 'Admin | Honda',
			'honda'    => $this->honda->orderBy('created_at', 'DESC')->findAll(),
		];
		
		return view('admin/mobil/honda/index', $data);
	}

    // DETAIL

    public function detail($slug)
    {
    $key = $this->honda->getHonda($slug);
    if (empty($key['mobil'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }
    
    $data = [
        'title'    => 'Honda | ' . $key['mobil'],
        'honda'    => $key,
    ];
    if (empty($data['honda'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }

		return view('admin/mobil/honda/detail', $data);
	}

	// CREATE

    public function create()
    {
    $data = [
			'title' => 'Admin | Tambah Data Honda',
			'validation' => \Config\Services::validation(),
    ];

    return view('admin/mobil/honda/create', $data);
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
    $namaGambar = 'defaulthonda.jpg';
    } else {
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('asset/img/mobil/honda', $namaGambar);
    }

    // SLIDE 1
    $fileGambar1 = $this->request->getFile('slide');
    if($fileGambar1->getError() == 4) {
    $namaGambar1 = 'defaulthonda.jpg';
    } else {
    $namaGambar1 = $fileGambar1->getRandomName();
    $fileGambar1->move('asset/img/mobil/honda', $namaGambar1);
    }

    // SLIDE 2
    $fileGambar2 = $this->request->getFile('slide2');
    if($fileGambar2->getError() == 4) {
    $namaGambar2 = 'defaulthonda.jpg';
    } else {
    $namaGambar2 = $fileGambar2->getRandomName();
    $fileGambar2->move('asset/img/mobil/honda', $namaGambar2);
    }

    // SLIDE 3
    $fileGambar3 = $this->request->getFile('slide3');
    if($fileGambar3->getError() == 4) {
    $namaGambar3 = 'defaulthonda.jpg';
    } else {
    $namaGambar3 = $fileGambar3->getRandomName();
    $fileGambar3->move('asset/img/mobil/honda', $namaGambar3);
    }

    // SLIDE 4
    $fileGambar4 = $this->request->getFile('slide4');
    if($fileGambar4->getError() == 4) {
    $namaGambar4 = 'defaulthonda.jpg';
    } else {
    $namaGambar4 = $fileGambar4->getRandomName();
    $fileGambar4->move('asset/img/mobil/honda', $namaGambar4);
    }

    $this->honda->save([
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

    return redirect()->to('admin/hondaadmin');
    }

	// DELETE DATA
    
    public function delete($id_honda)
    {
    $honda = $this->honda->find($id_honda);

    // cek jika file gambarnya default
    if($honda['gambar'] != 'defaulthonda.jpg') {
        unlink('asset/img/mobil/honda/' . $honda['gambar']);
    }
    if($honda['slide'] != 'defaulthonda.jpg') {
        unlink('asset/img/mobil/honda/' . $honda['slide']);
    }
    if($honda['slide2'] != 'defaulthonda.jpg') {
        unlink('asset/img/mobil/honda/' . $honda['slide2']);
    }
    if($honda['slide3'] != 'defaulthonda.jpg') {
        unlink('asset/img/mobil/honda/' . $honda['slide3']);
    }
    if($honda['slide4'] != 'defaulthonda.jpg') {
        unlink('asset/img/mobil/honda/' . $honda['slide4']);
    }

    $this->honda->delete($id_honda);
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('admin/hondaadmin');
    }

	// EDIT
    
    public function edit($slug)
    {
        $key = $this->honda->getHonda($slug);
        $data = [
            'title'         => 'Edit | ' . $key['mobil'],
            'validation'    => \Config\Services::validation(),
            'honda'         => $key,
        ];

        return view('admin/mobil/honda/edit', $data);
    }

        // UPDATE

    public function update($id_honda)
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
            return redirect()->to('admin/hondaadmin/edit/' . $this->request->getVar('slug'))
            ->withInput();
            }
        
        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        if($fileGambar->getError() == 4) {
        $namaGambar = $this->request->getVar('gambarLama');
        } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('asset/img/mobil/honda', $namaGambar);
        ($namaGambar) ? 'defaulthonda.jpg' : unlink('asset/img/mobil/honda/' . $this->request->getVar('gambarLama'));
        }

        // SLIDE 1
        $fileGambar1 = $this->request->getFile('slide');
        if($fileGambar1->getError() == 4) {
        $namaGambar1 = $this->request->getVar('slideLama');
        } else {
        $namaGambar1 = $fileGambar1->getRandomName();
        $fileGambar1->move('asset/img/mobil/honda', $namaGambar1);
        ($namaGambar1) ? 'defaulthonda.jpg' : unlink('asset/img/mobil/honda/' . $this->request->getVar('slideLama'));
        }

        // SLIDE 2
        $fileGambar2 = $this->request->getFile('slide2');
        if($fileGambar2->getError() == 4) {
        $namaGambar2 = $this->request->getVar('slideLama2');
        } else {
        $namaGambar2 = $fileGambar2->getRandomName();
        $fileGambar2->move('asset/img/mobil/honda', $namaGambar2);
        ($namaGambar2) ? 'defaulthonda.jpg' : unlink('asset/img/mobil/honda/' . $this->request->getVar('slideLama2'));
        }

        // SLIDE 3
        $fileGambar3 = $this->request->getFile('slide3');
        if($fileGambar3->getError() == 4) {
        $namaGambar3 = $this->request->getVar('slideLama3');
        } else {
        $namaGambar3 = $fileGambar3->getRandomName();
        $fileGambar3->move('asset/img/mobil/honda', $namaGambar3);
        ($namaGambar3) ? 'defaulthonda.jpg' : unlink('asset/img/mobil/honda/' . $this->request->getVar('slideLama3'));
        }

        // SLIDE 4
        $fileGambar4 = $this->request->getFile('slide4');
        if($fileGambar4->getError() == 4) {
        $namaGambar4 = $this->request->getVar('slideLama4');
        } else {
        $namaGambar4 = $fileGambar4->getRandomName();
        $fileGambar4->move('asset/img/mobil/honda', $namaGambar4);
        ($namaGambar4) ? 'defaulthonda.jpg' : unlink('asset/img/mobil/honda/' . $this->request->getVar('slideLama4'));
        }

        $this->honda->save([
        'id_honda'      => $id_honda,
        'mobil'         => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
        'slug'          => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')], $id_honda),
        'deskripsi'     => $this->request->getVar('deskripsi'),
        'gambar'        => $namaGambar,
        'slide'         => $namaGambar1,
        'slide2'        => $namaGambar2,
        'slide3'        => $namaGambar3,
        'slide4'        => $namaGambar4,
        ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to('admin/hondaadmin');
    }
}