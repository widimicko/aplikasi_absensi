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
            'semester' => $this->semesterModel->orderBy('semester', 'DESC')->findAll()
        ];

        return view('semester/index', $data);
    }

    public function create()
    {

        $semester = $this->request->getVar('semester');
        $status = $this->request->getVar('status');

       // Validate input
        if (!$this->validate([
            'semester' =>  'required|is_unique[semester.semester]',
            'status' => 'required',
        ])) {
            session()->setFlashData('tx_error_message', 'Error semester harus unik');
            return redirect()->back()->withInput();
        }

        if (substr($semester, -1) <= 0 || substr($semester, -1) > 2) {
            session()->setFlashData('tx_error_message', 'Error, semester harus berakhiran 1 (ganjil) atau 2 (genap)');
            return redirect()->back()->withInput();
        }

        $this->semesterModel->insert([
            'semester' =>  $semester,
            'status' => $status,
        ]);
    
        session()->setFlashData('tx_success_message', '"' . $semester . '" Berhasil Ditambahkan');
        return redirect()->to('semester');
    }

    public function update($id)
    {
        $semester = $this->semesterModel->find($id);

        $semester = $this->request->getVar('semester');
        $status = $this->request->getVar('status');

        if(empty($semester)) {
            session()->setFlashData('tx_error_message', 'Data tidak ditemukan');
            return redirect()->back();
        }

       // Validate input
        if (!$this->validate([
            'semester' => 'required',
            'status' => 'required',
        ])) {
            session()->setFlashData('tx_error_message', 'Error semester harus unik');
            return redirect()->back()->withInput();
        }

        if (substr($semester, -1) <= 0 || substr($semester, -1) > 2) {
            session()->setFlashData('tx_error_message', 'Error, semester harus berakhiran 1 (ganjil) atau 2 (genap)');
            return redirect()->back()->withInput();
        }

        $this->semesterModel->update($id, [
            'semester' => $semester,
            'status' => $status,
        ]);
      
        session()->setFlashData('tx_success_message','Data Berhasil Diubah');
        return redirect()->to('semester');
    }

    public function delete($id)
    {
        $semester = $this->semesterModel->find($id);

        if(empty($semester)) {
            session()->setFlashData('tx_error_message', 'Data tidak ditemukan');
            return redirect()->back();
        }

        $this->semesterModel->delete($id);
      
        session()->setFlashData('tx_success_message','Data Berhasil Dihapus');
        return redirect()->to('semester');
    }
}
