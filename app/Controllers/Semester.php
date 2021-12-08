<?php

namespace App\Controllers;

use App\Models\SemesterModel;

class Semester extends BaseController
{
    protected $semesterModel;

    public function __construct() {
        $this->semesterModel = new SemesterModel();
    }

    public function index()
    {
        $data = [
            'title' => "Semester",
            'semester' => $this->semesterModel->orderBy('status', 'ASC')->findAll()
        ];

        return view('semester/index', $data);
    }
}
