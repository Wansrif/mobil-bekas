<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mitsubishi extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getVar('keyword', FILTER_SANITIZE_STRING);
        if($keyword) {
        $mitsubishi = $this->mitsubishi->search($keyword);
        } else {
        $mitsubishi = $this->mitsubishi;
        }
        $data = [
            'title'         => 'Mitsubishi',
            'mitsubishi'    => $mitsubishi->orderBy('created_at', 'DESC')->paginate(6, 'mitsubishi'),
            'pager'         => $this->mitsubishi->pager,
        ];

        return view('user/tipe/mitsubishi/index', $data);
    }

    public function detail($slug)
    {
        $key = $this->mitsubishi->getMitsubishi($slug);
        if (empty($key['mobil'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $data = [
            'title' => $key['mobil'],
            'mitsubishi' => $key,
        ];
        
        if (empty($data['mitsubishi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('user/tipe/mitsubishi/detail', $data);
    }
}