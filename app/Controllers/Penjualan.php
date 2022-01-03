<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Slug;
use App\Models\KategoriModel;
use App\Models\PenjualanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->penjualan = new PenjualanModel();
        $this->kategori = new KategoriModel();

        $this->slug = new Slug([
            'field' => 'slug',
            'title' => 'mobil',
            'table' => 'penjualan',
            'id'    => 'id_penjualan',
        ]);
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Penjualan',
            'penjualan' => $this->penjualan->orderBy('waktu', 'DESC')->findAll()
        ];

        return view('admin/penjualan/index', $data);
    }
    

    // EXPORT EXCEL
    public function excel()
    {
        $penjualan = $this->penjualan->orderBy('waktu', 'ASC')->findAll();
        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Mobil')
            ->setCellValue('B1', 'Pembeli')
            ->setCellValue('C1', 'Whatsapp')
            ->setCellValue('D1', 'Kategori')
            ->setCellValue('E1', 'Terjual')
            ->setCellValue('F1', 'Harga');

        $column = 2;

        foreach ($penjualan as $val) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $val['mobil'])
                ->setCellValue('B' . $column, $val['pembeli'])
                ->setCellValue('C' . $column, $val['whatsapp'])
                ->setCellValue('D' . $column, $val['nama_kategori'])
                ->setCellValue('E' . $column, $val['waktu'])
                ->setCellValue('F' . $column, $val['harga']);

            $column++;
        }

        $writer = new Xls($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-Penjualan';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xls');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }


    // EXPORT PDF
    public function pdf()
    {
        $data = [
            'penjualan' => $this->penjualan->orderBy('waktu', 'ASC')->findAll()
        ];

        $html = view('admin/penjualan/pdf', $data);
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(date('Y-m-d-His'). '-Laporan-Penjualan.pdf');
    }


    // DETAIL

    public function detail($slug)
    {
        $key = $this->penjualan->getPenjualan($slug);
        if (empty($key['mobil'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $data = [
            'title'     => 'Laporan Penjualan | ' . $key['mobil'],
            'penjualan' => $key,
        ];
        if (empty($data['penjualan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('admin/penjualan/detail', $data);
    }

    
    // CREATE

    public function create()
    {
        $data = [
            'title'         => 'Admin | Tambah Data Penjualan',
            'validation'    => \Config\Services::validation(),
            'kategori'      => $this->kategori->findAll()
        ];

        return view('admin/penjualan/create', $data);
    }


    // SAVE

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'pembeli' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan nama pembeli terlebih dahulu.',
                ]
            ],
            'mobil' => [
                'rules' => 'required|is_unique[penjualan.mobil]',
                'errors' => [
                'is_unique' => 'Nama mobil sudah terdaftar',
                'required'  => 'Masukkan nama mobil terlebih dahulu.',
                ]
            ],
            'spesifikasi' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan spesifikasi terlebih dahulu.',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'  => [
                'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan kategori terlebih dahulu.',
                ]
            ],
            'whatsapp' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan No.HP / whatsapp terlebih dahulu.',
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan waktu terlebih dahulu.',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan harga terlebih dahulu.',
                ]
            ],
        ])) {
        return redirect()->back()->withInput();
        }
    
        // Gambar
        $fileGambar = $this->request->getFile('gambar');
        if($fileGambar->getError() == 4) {
        $namaGambar = 'default.jpg';
        } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('asset/img/penjualan', $namaGambar);
        }

        $this->penjualan->save([
        'pembeli'       => $this->request->getVar('pembeli', FILTER_SANITIZE_STRING),
        'mobil'         => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
        'spesifikasi'   => $this->request->getVar('spesifikasi'),
        'slug'          => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')]),
        'gambar'        => $namaGambar,
        'nama_kategori' => $this->request->getVar('kategori', FILTER_SANITIZE_STRING),
        'whatsapp'      => $this->request->getVar('whatsapp', FILTER_SANITIZE_STRING),
        'waktu'         => $this->request->getVar('waktu', FILTER_SANITIZE_STRING),
        'harga'         => $this->request->getVar('harga', FILTER_SANITIZE_STRING),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/penjualan');
    }


    // DELETE DATA
    
    public function delete($id_penjualan)
    {
        $penjualan = $this->penjualan->find($id_penjualan);

        // cek jika file gambarnya default
        if($penjualan['gambar'] !== 'default.jpg') {
            unlink('asset/img/penjualan/' . $penjualan['gambar']);
        }

        $this->penjualan->delete($id_penjualan);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('admin/penjualan');
    }
    

    // EDIT

    public function edit($slug)
    {
        $key = $this->penjualan->getPenjualan($slug);
        $data = [
            'title'         => 'Edit | ' . $key['mobil'],
            'validation'    => \Config\Services::validation(),
            'penjualan'     => $key,
            'kategori'      => $this->kategori->findAll(),
        ];

        return view('admin/penjualan/edit', $data);
    }


    // UPDATE

    public function update($id_penjualan)
    {
        // validasi input
        if(!$this->validate([
            'pembeli' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan nama pembeli terlebih dahulu.',
                ]
            ],
            'mobil' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan nama mobil terlebih dahulu.',
                ]
            ],
            'spesifikasi' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan spesifikasi terlebih dahulu.',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'  => [
                'max_size'  => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in'   => 'Gambar harus berformat .jpg/.jpeg/.png'
            ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan kategori terlebih dahulu.',
                ]
            ],
            'whatsapp' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan No.HP / whatsapp terlebih dahulu.',
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan waktu terlebih dahulu.',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Masukkan harga terlebih dahulu.',
                ]
            ],
        ])) {
                return redirect()->to('admin/penjualan/edit/' . $this->request->getVar('slug'))->withInput();
            }
        
        // Gambar
        $fileGambar = $this->request->getFile('gambar');
        if($fileGambar->getError() == 4) {
        $namaGambar = $this->request->getVar('gambarLama');
        } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('asset/img/penjualan', $namaGambar);
        ($namaGambar) ? 'default.jpg' : unlink('asset/img/penjualan/' . $this->request->getVar('gambarLama'));
        }

        $this->penjualan->save([
            'id_penjualan'  => $id_penjualan,
            'pembeli'       => $this->request->getVar('pembeli', FILTER_SANITIZE_STRING),
            'mobil'         => $this->request->getVar('mobil', FILTER_SANITIZE_STRING),
            'spesifikasi'   => $this->request->getVar('spesifikasi'),
            'slug'          => $this->slug->create_uri(['mobil' => $this->request->getVar('mobil')], $id_penjualan),
            'gambar'        => $namaGambar,
            'nama_kategori' => $this->request->getVar('kategori', FILTER_SANITIZE_STRING),
            'whatsapp'      => $this->request->getVar('whatsapp', FILTER_SANITIZE_STRING),
            'waktu'         => $this->request->getVar('waktu', FILTER_SANITIZE_STRING),
            'harga'         => $this->request->getVar('harga', FILTER_SANITIZE_STRING),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('admin/penjualan');
    }
}