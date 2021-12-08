<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\SemesterModel;

class Rekap extends BaseController
{
    protected $absensiModel;
    protected $semesterModel;

    public function __construct() {
        $this->absensiModel = new AbsensiModel();
        $this->semesterModel = new SemesterModel();
    }

    public function index()
    {
        $data = [
            'title' => "Rekap",
            'kelas' => NULL,
            'rekap' => $this->absensiModel->getAllRekapData()
        ];

        return view('rekap/index', $data);
    }

    public function rekapKelas($id_kelas) {

        $data = [
            'title' => "Rekap",
            'kelas' => $id_kelas,
            'rekap' => $this->absensiModel->getRekapByKelas($id_kelas, $this->semesterModel->getActiveSemester()->id)
        ];

        return view('rekap/index', $data);
    }
}
