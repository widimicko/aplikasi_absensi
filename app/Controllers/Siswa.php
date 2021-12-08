<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct() {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => "Beranda",
            'siswa' => $this->siswaModel->findAll()
        ];

        return view('siswa/index', $data);
    }

    public function siswaKelas($kelas)
    {
        $data = [
            'title' => "Beranda",
            'siswa' => $this->siswaModel->where('id_kelas', $kelas)->findAll()
        ];

        return view('siswa/index', $data);
    }
}
