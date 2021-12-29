<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Toyota extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getVar('keyword', FILTER_SANITIZE_STRING);
        if($keyword) {
        $toyota = $this->toyota->search($keyword);
        } else {
        $toyota = $this->toyota;
        }
        $data = [
            'title'     => 'Toyota',
            'toyota'    => $toyota->orderBy('created_at', 'DESC')->paginate(6, 'toyota'),
            'pager'     => $this->toyota->pager,
        ];

        return view('user/tipe/toyota/index', $data);
    }

    public function detail($slug)
    {
        $key = $this->toyota->getToyota($slug);
        if (empty($key['mobil'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $data = [
            'title' => $key['mobil'],
            'toyota' => $key,
        ];
        if (empty($data['toyota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('user/tipe/toyota/detail', $data);
    }
}