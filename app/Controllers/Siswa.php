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
            'all' => true,
            'siswa' => $this->siswaModel->findAll()
        ];

        return view('siswa/index', $data);
    }

    public function siswaKelas($kelas)
    {
        $data = [
            'title' => "Beranda",
            'all' => false,
            'siswa' => $this->siswaModel->where('id_kelas', $kelas)->findAll()
        ];

        return view('siswa/index', $data);
    }

    public function create()
    {
       // Validate input
        if (!$this->validate([
            'nis' =>  'required|is_unique[siswa.nis]',
            'nama' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
        ])) {
            session()->setFlashData('tx_error_message', 'Error validasi input, perhatikan isian form');
            return redirect()->back()->withInput();
        }

        if ($this->request->getVar('kelas') > 7 || $this->request->getVar('kelas') <= 0) {
            session()->setFlashData('tx_error_message', 'Isian kelas minimal 1 - 7');
            return redirect()->back()->withInput();
        }

        $this->siswaModel->insert([
            'nis' =>  $this->request->getVar('nis'),
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
          ]);
      
          session()->setFlashData('tx_success_message', 'Siswa "' . $this->request->getVar('nama') . '" Berhasil Ditambahkan');
          return redirect()->to('siswa');
    }

    public function update($nis)
    {
        $siswa = $this->siswaModel->find($nis);

        if(empty($siswa)) {
            session()->setFlashData('tx_error_message', 'Siswa tidak ditemukan');
            return redirect()->back();
        }

       // Validate input
        if (!$this->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
        ])) {
            session()->setFlashData('tx_error_message', 'Error validasi input, perhatikan isian form');
            return redirect()->back()->withInput();
        }

        if ($this->request->getVar('kelas') > 7 || $this->request->getVar('kelas') <= 0) {
            session()->setFlashData('tx_error_message', 'Isian kelas minimal 1 - 7');
            return redirect()->back()->withInput();
        }

        $this->siswaModel->update($nis, [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'angkatan' => $this->request->getVar('angkatan'),
        ]);
      
        session()->setFlashData('tx_success_message', 'Siswa "' . $siswa['nama'] . '" Berhasil Diubah');
        return redirect()->to('siswa');
    }

    public function delete($nis)
    {
        $siswa = $this->siswaModel->find($nis);

        if(empty($siswa)) {
            session()->setFlashData('tx_error_message', 'Siswa tidak ditemukan');
            return redirect()->back();
        }

        $this->siswaModel->delete($nis);
      
        session()->setFlashData('tx_success_message', 'Siswa "' . $siswa['nama'] . '" Berhasil Dihapus');
        return redirect()->to('siswa');
    }

    public function naikKelas()
    {
        $this->siswaModel
        ->whereIn('id_kelas', [6])
        ->set(['id_kelas' => 7])
        ->update();

        $this->siswaModel
        ->whereIn('id_kelas', [5])
        ->set(['id_kelas' => 6])
        ->update();

        $this->siswaModel
        ->whereIn('id_kelas', [4])
        ->set(['id_kelas' => 5])
        ->update();

        $this->siswaModel
        ->whereIn('id_kelas', [3])
        ->set(['id_kelas' => 4])
        ->update();

        $this->siswaModel
        ->whereIn('id_kelas', [2])
        ->set(['id_kelas' => 3])
        ->update();

        $this->siswaModel
        ->whereIn('id_kelas', [1])
        ->set(['id_kelas' => 2])
        ->update();
        

        session()->setFlashData('tx_success_message', 'Semua siswa telah naik kelas');
        return redirect()->to('siswa');
    }
}
