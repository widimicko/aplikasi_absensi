<?php

namespace App\Controllers;

use App\Models\AbsensiModel;

class Absensi extends BaseController
{
    protected $absensiModel;

    public function __construct() {
        $this->absensiModel = new AbsensiModel();
    }

    public function index()
    {
        $data = [
            'title' => "Absensi",
        ];

        return view('absensi/index', $data);
    }
}
