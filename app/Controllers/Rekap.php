<?php

namespace App\Controllers;

use App\Models\AbsensiModel;

class Rekap extends BaseController
{
    protected $absensiModel;

    public function __construct() {
        $this->absensiModel = new AbsensiModel();
    }

    public function index()
    {
        $data = [
            'title' => "Rekap",
        ];

        return view('rekap/index', $data);
    }
}
