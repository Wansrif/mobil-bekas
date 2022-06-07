<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Honda extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getVar('keyword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($keyword) {
        $honda = $this->honda->search($keyword);
        } else {
        $honda = $this->honda;
        }
        $data = [
            'title'         => 'Honda',
            'honda'         => $honda->orderBy('created_at', 'DESC')->paginate(6, 'honda'),
            'pager'         => $this->honda->pager,
        ];

        return view('user/tipe/honda/index', $data);
    }

    public function detail($slug)
    {
        $key = $this->honda->getHonda($slug);
        if (empty($key['mobil'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        
        $data = [
            'title' => $key['mobil'],
            'honda' => $key,
        ];
        if (empty($data['honda'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('user/tipe/honda/detail', $data);
    }
}